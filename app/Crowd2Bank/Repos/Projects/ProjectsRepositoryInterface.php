<?php namespace Crowd2Bank\Repos\Projects;

interface ProjectsRepositoryInterface {
	public function getLatestProjectsByTargetDate($limit, $target_date);
	public function currentProjects();
	public function sponsoredProjects();

}