<?php namespace Crowd2Bank\Repos\Users;

use Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface as Project,
	Cartalyst\Sentry\Facades\Laravel\Sentry as Sentry,
	Profile;

use Response, Session;

class UserRepository implements UserRepositoryInterface {

	protected $project;
	protected $profile;

	public function __construct(
		Project $project,
		Profile $profile
	)
	{
		$this->project = $project;
		$this->profile = $profile;
	}

	public function getProfile()
	{
		$id = Session::get('user.id');
		$userId = $this->profile->find($id)->user_id;
		$data = [
			'profile' => [
				'username'       => Session::get('user.username'),
				'fullname'       => Session::get('user.fullname'),
				'email'          => Session::get('user.email'),
				'contact'        => Session::get('user.contact'),
				'company'        => Session::get('user.company'),
				'total_projects' => Session::get('user.total_projects'),
				'total_backers'  => Session::get('user.total_backers'),
				'membership'     => 'Regular Member'
			],
			'current_projects' => $this->project->getCurrentProjectsByUserId($userId),
			'sponsored_projects' => $this->project->sponsoredProjects($userId)
		];

		return $data;
	}

	public function isAdmin()
	{
		return Sentry::getUser()->hasAccess('admin');
	}

}
