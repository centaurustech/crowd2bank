<?php namespace Crowd2Bank\Controllers;

use BaseController, View, Redirect;

class ProjectsController extends BaseController {

	public function getProjectsByCurrentCompleted()
	{
		return View::make('index');
	}

	public function getAllProecjts()
	{
		return View::make('browse-a-project');
	}

}