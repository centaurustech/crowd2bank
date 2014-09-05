<?php namespace Crowd2Bank\Controllers;

use Crowd2Bank\Repos\Users\UserRepositoryInterface as User;
use BaseController, View, Redirect;

class UserController extends BaseController {

	protected $user;
		
	public function __construct(User $user)
	{
		$this->user    = $user;		
	}

	public function getProfile()
	{	
		if($this->user->isAdmin())
		{
			return Redirect::to('users');
		}
		else
		{			
			$data = $this->user->getProfile();
			return View::make('profile')->with('data', $data);
		}

	}

}