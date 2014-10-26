<?php namespace Crowd2Bank\Repos\Users;

interface UserRepositoryInterface {

	/**
	 * Get profile details.
	 *
	 * @return Response
	 */
	public function getProfile();

	/**
	 * Check if the user is complete thier profile list
	 *
	 * @return Response
	 */
	public function profileExist($id);

	/**
	 * Get profile details.
	 *
	 * @return Response
	 */
	public function isAdmin();

	
}