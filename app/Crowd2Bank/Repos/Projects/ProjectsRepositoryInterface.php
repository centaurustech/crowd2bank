<?php namespace Crowd2Bank\Repos\Projects;

interface ProjectsRepositoryInterface {
	public function getLatestProjectsByTargetDate($limit, $target_date);
    public function getSingleProject($cat, $id);
	public function getCurrentProjectsByUserId($id);
	public function sponsoredProjects($id);    
    public function browseProjects($count);
}