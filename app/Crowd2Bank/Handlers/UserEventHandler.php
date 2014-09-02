<?php namespace Crowd2Bank\Handlers;

use Session, Event;

class UserEventHandler {

    // here is the listener
    public function subscribe($events)
    {
        //$events->listen('sentinel.user.login', 'Crowd2Bank\Handlers\UserEventHandler@getUser');
    }
    
}