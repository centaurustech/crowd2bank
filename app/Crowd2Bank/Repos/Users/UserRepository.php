<?php namespace Crowd2Bank\Repos\Users;

use Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface as Project;
use Cartalyst\Sentry\Facades\Laravel\Sentry as Sentry;
use Session;

class UserRepository implements UserRepositoryInterface {

	protected $project;

	public function __construct(Project $project)
	{
		$this->project = $project;
	}


	public function getProfile()
	{			

		$data = [
			'profile' => [
				'username'       => 'thecodingwhale',
				'fullname'       => 'Aldren Terante',
				'email'          => 'me@thecodingwhale.com',
				'contact'        => 9865340712,
				'company'        => 'Integreon',
				'total_projects' => 5,
				'total_backers'  => 5,
				'membership'     => 'Regular Memasdber'
			],
			'current_projects' => $this->project->currentProjects(),
			'sponsored_projects' => $this->project->sponsoredProjects()
		];

		return $data;
	}

	public function isAdmin()
	{
		return Sentry::getUser()->hasAccess('admin');
	}

}
