<?php namespace Crowd2Bank\Repos\Users;

use Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface as Project,
	Cartalyst\Sentry\Facades\Laravel\Sentry as Sentry,
	Response, Session;

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
				'username'       => Session::get('user.username'),
				'fullname'       => Session::get('user.fullname'),
				'email'          => Session::get('user.email'),
				'contact'        => Session::get('user.contact'),
				'company'        => Session::get('user.company'),
				'total_projects' => 5,
				'total_backers'  => 5,
				'membership'     => 'Regular Member'
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
