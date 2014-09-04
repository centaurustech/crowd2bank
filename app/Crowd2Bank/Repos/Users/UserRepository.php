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
			'username'       => 'thecodingwhale',
			'fullname'       => 'Aldren Terante',
			'email'          => 'me@thecodingwhale.com',
			'contact'        => 9865340712,
			'company'        => 'Integreon',
			'total_projects' => 5,
			'total_backers'  => 5,
			'membership'     => 'Regular Memasdber'
		];		
	}

}
