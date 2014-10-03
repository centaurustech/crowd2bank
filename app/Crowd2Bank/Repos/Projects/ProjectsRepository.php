<?php namespace Crowd2Bank\Repos\Projects;

use Crowd2Bank\Utilities\DateTime,
	Project;

use Exception,
	Response;

class ProjectsRepository implements ProjectsRepositoryInterface {

    protected $project;
    protected $date;

    public function __construct(Project $project, DateTime $date)
    {
		$this->project = $project;
		$this->date    = $date;
    }

    public function getLatestProjectsByTargetDate($limit, $target_date = 'current')
    {
    	//
    	$operator = ( $target_date == 'completed' ) ? '<=' : '>=';

    	//
		$projects = $this->project->where('target_date', $operator, $this->date->today())
						->orderBy('id', 'DESC')->take($limit)->get();

		foreach ($projects as $key => $value) {

			$project_date              = $this->date->toTime($projects[$key]['target_date']);
			$status                    = $this->date->compareToday($project_date);
			
			$data[$key]['product_id']  = $value['id'];			
			$data[$key]['title']       = $value['title'];
			$data[$key]['description'] = $value['short_description'];
			$data[$key]['thumbnail']   = $value['thumbnail'];
			$data[$key]['target_fund'] = $value['target_fund'];
			$data[$key]['target_date'] = $value['target_date'];

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
