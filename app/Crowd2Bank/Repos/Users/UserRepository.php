<?php namespace Crowd2Bank\Repos\Users;

use Session;

class UserRepository implements UserRepositoryInterface {

	public function getId() {
		return [
			'userId' => Session::get('id')
		];
	}

	public function getProfile()
	{					
		return [
			'username'      => Session::get('username'),
			'fullname'      => Session::get('userFullname'),
			'email'         => Session::get('email'),
			'contact'       => Session::get('contact'),
			'company'       => Session::get('company'),
			'projects' => Session::get('totalProjects'),
			'backers'  => Session::get('totalBackers')
		];
	}

}
