<?php namespace Crowd2Bank\Repos\Projects;

interface ProjectsRepositoryInterface {

	public function getProjectsByTargetDate($limit, $category);

	public function currentProjects();

	public function sponsoredProjects();

}