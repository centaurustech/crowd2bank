<?php namespace Crowd2Bank\Handlers;

use Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface as Projects;
use Session;

class UserEventHandler {

    public function __construct(Projects $projects)
    {
        $this->projects = $projects;
    }

    public function subscribe($events) {

        $events->listen('sentinel.user.login', 'Crowd2Bank\Handlers\UserEventHandler@getProfile');
    }

    public function getProfile($user)
    {
    	$fullname = $user->first_name . ' ' . $user->last_name;
        Session::put('userId', $user->id);
        Session::put('username', $user->username);
        Session::put('userFullname', ucwords($fullname));
        Session::put('contact', $user->contact);
        Session::put('company', $user->company);
        Session::put('totalProjects', $this->projects->totalProjects());
        Session::put('totalBackers', $this->projects->totalBackers());
    }

}