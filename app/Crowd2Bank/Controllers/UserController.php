<?php namespace Crowd2Bank\Controllers;

use Crowd2Bank\Repos\Users\UserRepositoryInterface as User;
use Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface as Project;
use BaseController, View;

class UserController extends BaseController {

	public function __construct(User $user, Project $project)
	{
		$this->user    = $user;
		$this->project = $project;
	}

	public function getProfile()
	{		
		$data = [
			'profile' => $this->user->getProfile(),
			'current_projects' => $this->project->currentProjects(),
			'sponsored_projects' => $this->project->sponsoredProjects()
		];
		
		return View::make('profile')->with('data', $data);
	}

}