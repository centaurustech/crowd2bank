<?php namespace Crowd2Bank\Repos\Users;

interface UserRepositoryInterface {

	/**
	 * Get profile details.
	 *
	 * @return Response
	 */
	public function getProfile();

	/**
	 * Get profile details.
	 *
	 * @return Response
	 */
	public function isAdmin();

	
}