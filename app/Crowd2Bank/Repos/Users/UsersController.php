<?php namespace Crowd2Bank\Repos\Users;

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
		return View::make('dashboard')->with('data', $data);
	}

	public function createProject()
	{
		return View::make('create-a-project');
	}

}