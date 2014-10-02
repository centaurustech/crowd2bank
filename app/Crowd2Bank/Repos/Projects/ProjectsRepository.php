<?php namespace Crowd2Bank\Repos\Projects;

use Projects;

use Exception,
	Response;

class ProjectsRepository implements ProjectsRepositoryInterface {

    protected $projects;

    public function __construct(Projects $projects)
    {
        $this->projects = $projects;
    }

	public function getProjectsByTargetDate($limit, $category)
	{
		if ( $category != 'current' && $category != 'completed' )
		{
			throw new Exception('$category ' . ' is not given.');
		}
		else if (!is_string($category))
		{
			throw new Exception('$category ' . ' should be a string.');
		}
		else if ( !is_int($limit) )
		{
			throw new Exception('error on $limit ' . ' should be an integer');
		}
		else
		{
			$option = ( $category == 'completed' ) ? '<=' : '>=';

			$project = $this->projects->where('target_date', $option, new \DateTime('today'))
							->orderBy('id', 'DESC')
							->take($limit)
							->get();

			return $project->toJson();
		}
		

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
