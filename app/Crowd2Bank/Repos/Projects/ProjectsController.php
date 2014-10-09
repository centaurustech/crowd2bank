<?php namespace Crowd2Bank\Repos\Projects;

use Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface as Projects;
use BaseController, View, Redirect;

class ProjectsController extends BaseController {

	protected $projects;
		
	public function __construct(Projects $projects)
	{
		$this->projects = $projects;
	}

	public function index()
	{	
		$limit     = 8;
		$current   = $this->projects->getLatestProjectsByTargetDate($limit, 'current');
		$completed = $this->projects->getLatestProjectsByTargetDate($limit, 'completed');
		$projects   = array_merge($current, $completed);
		return View::make('index', compact("projects"));
	}

	public function getAllProjects()
	{
		return View::make('browse-a-project');
	}

	public function pledgeAProject()
	{
		return View::make('pledge-a-project');
		
	}

}
