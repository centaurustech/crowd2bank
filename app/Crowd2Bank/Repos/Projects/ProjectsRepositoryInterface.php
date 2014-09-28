<?php namespace  Crowd2Bank\Repos\Projects;

interface ProjectsRepositoryInterface {

	public function getProjects(array $id);

	public function currentProjects();

	public function sponsoredProjects();

}