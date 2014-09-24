<?php namespace Crowd2Bank\Repos\Projects;

use BaseController, View, Redirect;

class ProjectsController extends BaseController {

	public function getProjectsByCurrentCompleted()
	{
		return View::make('index');
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