<?php namespace Crowd2Bank\Handlers;

use Events;
use Session;

class UserEventHandler {

    public function subscribe($events) {

        $events->listen('sentinel.user.login', 'Crowd2Bank\Handlers\UserEventHandler@getUser');
    }

    public function getUser($user)
    {       
    	$fullname = $user->first_name . ' ' . $user->last_name;
	    Session::put('username', $user->username);
	    Session::put('userFullname', ucwords($fullname));
	    Session::put('contact', $user->contact);
	    Session::put('company', $user->company);

    }

}