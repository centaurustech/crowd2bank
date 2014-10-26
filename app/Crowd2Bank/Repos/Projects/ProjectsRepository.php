<?php namespace Crowd2Bank\Repos\Projects;

use Crowd2Bank\Utilities\DateTime,
	Crowd2Bank\Utilities\Html,
	Crowd2Bank\Utilities\Math;
use Fund, Profile, Project;
use DB, Session, Exception, Response, Paginator;

class ProjectsRepository implements ProjectsRepositoryInterface {

    protected $project;
    protected $profile;
    protected $fund;
    protected $date;
    protected $html;

    public function __construct(
        Project $project,
        Profile $profile,
        Fund $fund,
        DateTime $date,
        Html $html,
        Math $math
    )
    {
        $this->project = $project;
        $this->profile = $profile;
        $this->fund    = $fund;
        $this->date    = $date;
        $this->html    = $html;
        $this->math    = $math;
    }

    public function getLatestProjectsByTargetDate($limit, $target_date = 'current')
    {
    	$operator = ( $target_date == 'completed' ) ? '<=' : '>=';
        $status = ( $target_date == 'completed' ) ? 5 : 1;

		$projects = $this->project
                        ->where(function($query) use ($operator, $status){
                            $query->where('target_date', $operator, $this->date->today())
                                  ->where('status', '=', $status);
                        })						
						->orderBy('target_date', 'DESC')->take($limit)->get();


		foreach ($projects as $key => $value) {
			
			$funds                      = $this->project->find($value['id'])->funds;
			$funded                     = $funds->sum('pledge_amount');
			$backers                    = $funds->count();
			
			$average                    = $this->math->average($funded, $value['target_fund']);
			
			$data[$key]['product_id']   = $value['id'];			
			$data[$key]['title']        = $value['title'];
			
			$data[$key]['description']  = $this->html->shortDescription($value['short_description']);
			$data[$key]['thumbnail']    = $value['thumbnail'];
			$data[$key]['target_fund']  = $this->html->setCurrency($value['target_fund']);
			$data[$key]['funded']       = $this->html->setCurrency($funded);
			$data[$key]['status']       = $this->html->status($target_date, $average);
			$data[$key]['percentage']   = $this->html->percentage($average);
			$data[$key]['progress_bar'] = $this->html->progressBar($target_date, $average);
			$data[$key]['backers']      = $backers;
			$data[$key]['target_date']  = $value['target_date'];

		}

		return [$target_date => $data];
    }

    public function getSingleProject($id)
    {

        $single = $this->project              
                    ->where('projects.id', '=', $id)
                    ->join('project_details', function($join)
                    {
                        $join->on('project_details.project_id', '=', 'projects.id');
                    })
                    ->select(
                            'projects.target_date',
                            'projects.thumbnail',
                            'projects.title',
                            'projects.target_fund',
                            'projects.user_id AS author_id',                            

                            'project_details.full_description',
                            'project_details.facebook_count',
                            'project_details.twitter_count',
                            DB::raw("
                            (
                                SELECT
                                    project_status.type
                                FROM
                                    project_status
                                WHERE
                                    project_status.number = projects.status
                            ) AS status"),
                            DB::raw("
                            (
                                SELECT
                                    SUM(funds.pledge_amount)
                                FROM
                                    funds
                                WHERE
                                    funds.project_id = projects.id
                            ) AS funded"),
                            DB::raw("
                            (
                                SELECT
                                    CONCAT(user_profiles.first_name, Char(32), user_profiles.last_name)
                                FROM
                                    user_profiles
                                WHERE
                                    user_profiles.user_id = projects.user_id
                            ) AS author"),
                            DB::raw("
                            (
                                SELECT
                                    CASE
                                        WHEN DATE(projects.target_date) < NOW() THEN 'completed'
                                        ELSE 'current'
                                    END
                            ) AS category")
                    )
                    ->first();

        $support = $this->project
                        ->where('projects.id', '=', $id)
                        ->join('project_supports', function($join)
                        {
                            $join->on('project_supports.project_id', '=', 'projects.id');
                        })                         
                        ->orderBy('amount')                        
                        ->get();


            $project['single']  = $single->toArray();
            $project['support'] = $support->toArray();

            return $project;

    }

	public function getCurrentProjectsByUserId($userId)
	{
        $projects    = $this->project->where('user_id', '=', $userId)->get();
        $data = [];

        if ( $projects != NULL ) {

            foreach ($projects as $key => $value) {

                $total_funds = $this->project->find($value['id'])->funds->sum('pledge_amount');

                $data[$key]['title_project'] = $value['title'];           
                $data[$key]['status']        = $value['status'];
                $data[$key]['target_fund']   = $value['target_fund'];
                $data[$key]['total_funds']   = $total_funds;
            }

        }
        else
        {
            $data = 0;
        }
        return $data;
	}  

	public function sponsoredProjects($userId)
	{
        $funds = $this->fund->where('user_profile_id', '=', $userId)->get();
        $data = [];

        if ( $funds != NULL ) {
            
            foreach ($funds as $key => $fund) {

                $project = $this->project->find($fund['project_id']);
                $userId  = $project->user_id;
                
                $profile = $this->profile->where('user_id', '=', $userId)->get()->first();

                $title                       = $project->title;
                $date                        = $project->target_date;
                
                $project_by                  = $profile->first_name . ' ' . $profile->last_name;
                $contribution                = $fund->pledge_amount;
                
                $data[$key]['title_project'] = $title;
                $data[$key]['project_by']    = $project_by;
                $data[$key]['status']        = $date;
                $data[$key]['contribution']  = $contribution;
            }        

        }
        else
        {
                $data = 0;
        }

        return $data;
	}
	
    public function browseProjects($count)
    {
        $projects = $this->project
                         ->select(DB::raw('
                            projects.id,
                            projects.target_date,
                            projects.thumbnail,
                            projects.title,
                            projects.short_description,
                            projects.target_fund
                         '),
                            DB::raw("
                            (
                                SELECT SUM(funds.pledge_amount)
                                FROM funds
                                WHERE funds.project_id = projects.id
                            ) AS funded"),
                            DB::raw("
                            (
                                SELECT COUNT(funds.user_profile_id)
                                FROM funds
                                WHERE funds.project_id = projects.id
                            ) AS backers"),
                            DB::raw("
                            (
                                SELECT
                                    CASE
                                        WHEN DATE(projects.target_date) < NOW() THEN 'completed'
                                        ELSE 'current'
                                    END
                                FROM projects
                                WHERE funds.project_id = projects.id
                            ) AS category")
                         )
                         ->join(DB::raw('funds'), function($join){
                            $join->on('projects.id', '=', 'funds.project_id');
                         })
                         ->distinct('projects.id')
                         ->where('projects.status', '=', 1)
                         ->orderBy('projects.id', 'desc')
                         ->get();

        return $projects;
    }

    public function getAllActiveProjects()
    {
        Paginator::setPageName('active_projects');
        $query = $this->project
                     ->select(DB::raw('
                        projects.id,
                        projects.title,
                        projects.created_at as start_date,                        
                        projects.target_date
                     '),DB::raw("
                        (
                            SELECT
                                CONCAT(user_profiles.first_name, Char(32), user_profiles.last_name)
                            FROM
                                user_profiles
                            WHERE
                                user_profiles.user_id = projects.user_id
                        ) AS author"))
                    ->where('target_date', '>', $this->date->today())
                    ->where('status', '=', 1)
                    ->paginate(10);
        return $query;
    }

    public function getAllEndProjects()
    {
        Paginator::setPageName('end_projects');
        $query = $this->project
                     ->select(DB::raw('
                        projects.id,
                        projects.title,
                        projects.created_at as start_date,                        
                        projects.target_date
                     '),DB::raw("
                        (
                            SELECT
                                CONCAT(user_profiles.first_name, Char(32), user_profiles.last_name)
                            FROM
                                user_profiles
                            WHERE
                                user_profiles.user_id = projects.user_id
                        ) AS author"))
                    ->where('target_date', '<', $this->date->today())
                    ->where('status', '=', 5)
                    ->paginate(10);
        return $query;
    }

    public function getAllNewProjects()
    {
        Paginator::setPageName('new_projects');
        $query = $this->project
                     ->select(DB::raw('
                        projects.id,
                        projects.title,
                        projects.target_date
                     '),DB::raw("
                        (
                            SELECT
                                CONCAT(user_profiles.first_name, Char(32), user_profiles.last_name)
                            FROM
                                user_profiles
                            WHERE
                                user_profiles.user_id = projects.user_id
                        ) AS author"))            
                    ->where('target_date', '>', $this->date->today())
                    ->where('status', '=', 2)
                    ->paginate(10);
        return $query;
    }
}