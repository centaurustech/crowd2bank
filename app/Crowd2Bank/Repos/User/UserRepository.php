<?php namespace Crowd2Bank\Repo\User;

use Session;

class UserRepository implements UserRepositoryInterface {

	public function getProfile()
	{					
		$profile = [
			'username' => Session::get('username'),
			'fullname' => Session::get('userFullname'),
			'email'    => Session::get('email'),
			'contact'    => Session::get('contact'),
			'company'    => Session::get('company')
		];

		return $profile;
	}

}
