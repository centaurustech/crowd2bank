<?php namespace Crowd2Bank\Repos\Projects;

use Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface as Projects;
use Project, BaseController, View, Redirect, Paginator;

class ProjectsController extends BaseController {

	protected $projects;
		
	public function __construct(Projects $projects)
	{
		$this->projects = $projects;
	}

	public function index()
	{	
		$limit     = 8;
		$current   = $this->projects->getLatestProjectsByTargetDate($limit, 'current');
		$completed = $this->projects->getLatestProjectsByTargetDate($limit, 'completed');
		$projects   = array_merge($current, $completed);
		return View::make('index', compact("projects"));
	}

	public function getByPage($page = 1, $limit = 10)
	{
		$results = StdClass;
		$results->page = $page;
		$results->limit = $limit;
		$results->totalItems = 0;
		$results->items = array();

		$users = $this->model->skip($limit * ($page - 1))->take($limit)->get();

		$results->totalItems = $this->model->count();
		$results->items = $users->all();

		return $results;
	}

	public function getAllProjects()
	{
		$itemsPerPage = 8;
		$pageNumber   = ( isset($_GET['page']) ) ? $_GET['page'] : 0;
		$start        = ( $pageNumber ) ? ( $itemsPerPage * $pageNumber ) - $pageNumber : 0;
		

		$items        = $this->projects->browseProjects($itemsPerPage);
		$itemsSlice   = array_slice($items->toArray(), $start, $itemsPerPage);
		$paginator    = Paginator::make($itemsSlice, count($items), $itemsPerPage);	

		$projects['projects'] = $paginator;
		return View::make('browse-a-project', $projects);
	}

	public function pledgeAProject()
	{
		return View::make('pledge-a-project');
		
	}
	public function singlePage($id)
	{
		$project = $this->projects->getSingleProject($id);
		return View::make('single-page', ['project' => $project]);
	}

}
