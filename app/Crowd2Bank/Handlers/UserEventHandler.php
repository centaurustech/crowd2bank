<?php namespace Crowd2Bank\Handlers;

use Session;
use Cartalyst\Sentry\Sentry;

class UserEventHandler {

    public function subscribe($events) {

        $events->listen('sentinel.user.login', 'Crowd2Bank\Handlers\UserEventHandler@getId');
        $events->listen('sentinel.user.registered', 'Crowd2Bank\Handlers\UserEventHandler@notifitionEmailForAdmin');
    }

    public function getId($user)
    {    	
        return $user->id;
    }

    public function notifitionEmailForAdmin($data)
    {
		Mail::queue('emails.welcome', $data, function($message)
		{
		    $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
		});
    }

}