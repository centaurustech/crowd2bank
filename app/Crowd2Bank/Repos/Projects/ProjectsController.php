<?php namespace Crowd2Bank\Repos\Projects;

use Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface as Projects;
use BaseController, View, Redirect;

class ProjectsController extends BaseController {

	protected $projects;
		
	public function __construct(Projects $projects)
	{
		$this->projects    = $projects;		
	}

	public function index()
	{
		// echo '<pre>';
		// dd($this->projects->getProjects(['current', 'completed']));

		return View::make('index');
	}

	public function getAllProjects()
	{
		return View::make('browse-a-project');
	}

	public function pledgeAProject()
	{
		return View::make('pledge-a-project');
		
	}

	public function singlePage($id)
	{
		$title = [
			'the rolling bench',
			'keyboard food top cover',
			'the bookcase chair',
			'spacesaver cabinet',
		];

		$data = [ 
			'title' => $title[$id - 1],
			'id' => $id
		];
		return View::make('single-page', $data);
	}

}