<?php namespace Crowd2Bank\Handlers;

class UserEventHandler {

    // here is the listener
    public function subscribe($events)
    {
        $events->listen('user.profile', 'Crowd2Bank\Handlers\UserEventHandler@getProfile');
    }
    
    // happens when the user logs in
    public function getProfile()
    {
        echo 'The user just logged in';
    }

}