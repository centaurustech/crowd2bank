<?php namespace Crowd2Bank\Controllers;

use Crowd2Bank\Repos\Users\UserRepositoryInterface as User;
use BaseController, View, Redirect;

class UsersController extends BaseController {

	protected $user;
		
	public function __construct(User $user)
	{
		$this->user    = $user;		
	}

	public function getProfile()
	{
		$data = $this->user->getProfile();
		if( $this->user->isAdmin() )
		{
			return View::make('dashboard')->with('data', $data);
		}
		return View::make('profile')->with('data', $data);
	}

	public function createProject()
	{
		return View::make('create-a-project');
	}

}