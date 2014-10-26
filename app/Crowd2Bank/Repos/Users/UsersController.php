<?php namespace Crowd2Bank\Repos\Users;

use Crowd2Bank\Repos\Users\UserRepositoryInterface as User;
use BaseController, View, Redirect, Session;

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
		$id = Session::get('user.id');
		$exist = $this->user->profileExist($id);
		return View::make('create-a-project', ['exist' => $exist]);
	}

}