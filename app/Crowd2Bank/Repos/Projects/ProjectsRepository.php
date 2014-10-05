<?php namespace Crowd2Bank\Repos\Projects;

use Crowd2Bank\Utilities\DateTime,
	Crowd2Bank\Utilities\Html,
	Crowd2Bank\Utilities\Math,
	Project;

use DB,
	Exception,
	Response;

class ProjectsRepository implements ProjectsRepositoryInterface {

    protected $project;
    protected $date;
    protected $html;

    public function __construct(
    	Project $project,
    	DateTime $date,
    	Html $html,
    	Math $math
    )
    {
		$this->project = $project;
		$this->date    = $date;
		$this->html    = $html;
		$this->math    = $math;
    }

    public function getLatestProjectsByTargetDate($limit, $target_date = 'current')
    {
    	//
    	$operator = ( $target_date == 'completed' ) ? '<=' : '>=';

    	//
		$projects = $this->project
						->where('target_date', $operator, $this->date->today())
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

	public function currentProjects()
	{
		return [[
				'title_project' => 'Glass Bread Toaster',
				'date'          => 'July 6, 2014',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'total_funds'   => 'US$ 2500'
			],[
				'title_project' => 'Glass Bread Toaster',
				'date'          => 'July 6, 2014',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'total_funds'   => 'US$ 2500'
			],[
				'title_project' => 'Glass Bread Toaster',
				'date'          => 'July 6, 2014',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'total_funds'   => 'US$ 2500'
		]];
	}

	public function sponsoredProjects()
	{
		return [[
				'title_project' => 'Glass Bread Toaster',
				'project_by'    => 'Lady Jane',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'date'          => 'July 6, 2014'
			],[
				'title_project' => 'Glass Bread Toaster',
				'project_by'    => 'Lady Jane',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'date'          => 'July 6, 2014'
			],[
				'title_project' => 'Glass Bread Toaster',
				'project_by'    => 'Lady Jane',
				'status'        => '5 Days | 3 Hours | 40 Mins',
				'date'          => 'July 6, 2014'
		]];
	}
	
}
