<?php namespace Crowd2Bank\Repos\Projects;

interface ProjectsRepositoryInterface {
	public function getLatestProjectsByTargetDate($limit, $target_date);
    public function getSingleProject($id);
	public function getCurrentProjectsByUserId($id);
	public function sponsoredProjects($id);    
    public function browseProjects($count);
    public function getAllActiveProjects();
    public function getAllEndProjects();
    public function getAllNewProjects();
}