<?php namespace Crowd2Bank\Repos\Projects;

// utilities
use Crowd2Bank\Utilities\DateTime,
	Crowd2Bank\Utilities\Html,
	Crowd2Bank\Utilities\Math;

// models
use Fund,
    Profile,
	Project;

use DB,
    Session,
	Exception,
	Response;

class ProjectsRepository implements ProjectsRepositoryInterface {

    protected $project;
    protected $profile;
    protected $fund;
    protected $date;
    protected $html;

    public function __construct(Project $project,
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

		$projects = $this->project
                        ->where(function($query) use ($operator){
                            $query->where('target_date', $operator, $this->date->today())
                                  ->where('activated', '=', 1);
                        })						
						->orderBy('target_date', 'DESC')->take($limit)->get();

        // echo '<pre>';
        // dd($projects->toArray());

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

    public function getSingleProject($cat, $id)
    {
        $project = $this->project->find($id);
        $profile = $project->profiles;
        $funds   = $project->funds;
               

        $funded  = $funds->sum('pledge_amount');
        $author  = $profile->first_name . ' ' . $profile->last_name;
        $average = $this->math->average($funded, $project['target_fund']);


        return [ 
            'title'             => $project['title'],
            'short_description' => $project['short_description'],
            'progress_bar'      => $this->html->progressBar($cat, $average),
            'author'            => $author,
            'status'            => $this->html->status($cat, $average),
            'percentage'        => $this->html->percentage($average),
            'funded'            => $this->html->setCurrency($funded),
            'thumbnail'         => $project['thumbnail'],
            'target_fund'       => $this->html->setCurrency($project['target_fund']),
            'target_date'       => $project['target_date']
        ];
    }

	public function getCurrentProjectsByUserId($userId)
	{
        $projects    = $this->project->where('user_id', '=', $userId)->get();

        foreach ($projects as $key => $value) {

            $total_funds = $this->project->find($value['id'])->funds->sum('pledge_amount');

			$data[$key]['title_project'] = $value['title'];           
			$data[$key]['status']        = $value['target_date'];
			$data[$key]['target_fund']   = $value['target_fund'];
			$data[$key]['total_funds']   = $total_funds ;
        }

        return $data;
	}

	public function sponsoredProjects($userId)
	{
        $funds = $this->fund->where('user_profile_id', '=', $userId)->get();
        
        foreach ($funds as $key => $fund) {

            $project = $this->project->find($fund['project_id']);
            $userId  = $project->user_id;
            
            $profile = $this->profile->where('user_id', '=', $userId)->get()->first();

            $title                       = $project->title;
            $date                        = $project->target_date;
            
            $project_by                  = $profile->first_name . ' ' . $profile->last_name;
            $contribution                = '2';
            
            $data[$key]['title_project'] = $title;
            $data[$key]['project_by']    = $project_by;
            $data[$key]['status']        = $date;
            $data[$key]['contribution']  = $contribution;
        }

        return $data;
	}
	
    public function browseProjects($count)
    {
        $projects = $this->project
                         ->select(DB::raw('
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
                            ) as funded"),
                            DB::raw("
                            (
                                SELECT COUNT(funds.user_profile_id)
                                FROM funds
                                WHERE funds.project_id = projects.id
                            ) as backers")
                         )
                         ->join(DB::raw('funds'), function($join){
                            $join->on('projects.id', '=', 'funds.project_id');
                         })
                         ->distinct('projects.id')
                         ->where('projects.activated', '=', 1)
                         ->orderBy('projects.id', 'desc')
                         ->get();
    
        return $projects;
    }
}
