<?php namespace Crowd2Bank\Repos\Users;

interface UserRepositoryInterface {

	/**
	 * Get profile details.
	 *
	 * @return Response
	 */
	public function getProfile($id);

	/**
	 * Get profile details.
	 *
	 * @return Response
	 */
	public function isAdmin();

	
}