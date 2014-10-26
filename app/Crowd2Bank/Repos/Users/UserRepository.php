<?php namespace Crowd2Bank\Repos\Users;

use Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface as Project,
	Cartalyst\Sentry\Facades\Laravel\Sentry as Sentry,
	Profile;

use Response, Redirect, Session;

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
		if ( !$this->isAdmin() )
		{			
			$id = Session::get('user.id');		

			$data = [
				'profile' => [
					'fullname'       => Session::get('user.fullname'),
					'email'          => Session::get('user.email'),
					'contact'        => Session::get('user.contact'),
					'company'        => Session::get('user.company'),
					'total_projects' => Session::get('user.total_projects'),
					'total_backers'  => Session::get('user.total_backers'),
					'membership'     => 'Regular Member'
				],
				'current_projects' => $this->project->getCurrentProjectsByUserId($id),
				'sponsored_projects' => $this->project->sponsoredProjects($id)
			];			
		}
		else
		{
			$data = [
				'profile' => [
					'email'      => Session::get('user.email'),
					'membership' => 'Administrator'
				],
				'new_projects' => $this->project->getAllNewProjects(),
				'active_projects' => $this->project->getAllActiveProjects(),
				'end_projects' => $this->project->getAllEndProjects()
			];
		}

		return $data;
		
	}

	public function profileExist($id) {

		$user = $this->profile->where('user_id', '=', $id)->get(['first_name', 'last_name', 'contact_number', 'company']);
		
		if ( isset($user[0]) ) // check if session id is exist on profiles database
		{
			// set the object to array 
			$user = $user[0]->toArray();
			$data = [];

			// push all array value to a array
			foreach ($user as $key => $value) {
				array_push($data, $value);
			}

			if (in_array('', $data)) // check if all require fields are completed
			{
				// please complete your profile information first'
				return false;
			}
			else
			{
				return true;
			}
		}
		else //check if session id is not exist on profiles database
		{
			// please complete your profile information first'
			return false;
		}
	}

	public function isAdmin()
	{
		return Sentry::getUser()->hasAccess('admin');
	}

}
