<?php namespace Crowd2Bank\Controllers;

use View;
use Event;
use Session;
use BaseController;

class UserController extends BaseController {

	public function getProfile()
	{			
		$users = Session::all();
		return View::make('profile', ['users' => $users]);
	}

}
