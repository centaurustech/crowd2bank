<?php namespace Crowd2Bank\Controllers;

use Crowd2Bank\Repo\User\UserRepositoryInterface;
use BaseController, View;

class UserController extends BaseController {

	public function __construct(UserRepositoryInterface $user)
	{
		$this->user = $user;
	}

	public function getProfile()
	{		
		$profile = array('profile' => $this->user->getProfile());
		return View::make('profile', $profile);
	}

}