<?php namespace  Crowd2Bank\Repos\Projects;

interface ProjectsRepositoryInterface {

	public function getProjects($limit);

	public function currentProjects();

	public function sponsoredProjects();

}