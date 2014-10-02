<?php namespace Crowd2Bank\Repos\Projects;

use Projects;

class ProjectsRepository implements ProjectsRepositoryInterface {

	public function getProjects($limit)
	{
		$current = Projects::where('target_date', '>=', new \DateTime('today'))
					->orderBy('id', 'DESC')
					->take($limit)->get();

		return $current;
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
