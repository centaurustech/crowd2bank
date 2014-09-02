<?php namespace Crowd2Bank\Controllers;

use BaseController, Session, Event, View;

class UserController extends BaseController {
	
	public function getProfile()
	{
		$users = Session::all();
		return View::make('profile', ['users' => $users]);		
	}

}
