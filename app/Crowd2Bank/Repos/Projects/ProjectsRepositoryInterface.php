<?php namespace  Crowd2Bank\Repos\Projects;

interface ProjectsRepositoryInterface {

	/**
	 * Get total projects by user id
	 *
	 * @return Response
	 */
	public function totalProjects();

	/**
	 * Get total backers by user id
	 *
	 * @return Response
	 */
	public function totalBackers();

}