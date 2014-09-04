<?php namespace  Crowd2Bank\Repos\Projects;

interface ProjectsRepositoryInterface {

	/**
	 * All current projects by user id
	 *
	 * @return Response
	 */	
	public function currentProjects();

	/**
	 * Sponsored Projects by user id
	 *
	 * @return Response
	 */	
	public function sponsoredProjects();

}