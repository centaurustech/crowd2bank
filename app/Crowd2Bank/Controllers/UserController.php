<?php namespace Crowd2Bank\Controllers;

use Crowd2Bank\Repos\Users\UserRepositoryInterface as User;
use BaseController, View;

class UserController extends BaseController {

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function getProfile()
	{		
		$profile = array('profile' => $this->user->getProfile());
		return View::make('profile', $profile);
	}

}