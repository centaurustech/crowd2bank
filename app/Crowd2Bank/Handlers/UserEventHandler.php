<?php namespace Crowd2Bank\Handlers;

use Session;

class UserEventHandler {

    public function subscribe($events) {

        $events->listen('sentinel.user.login', 'Crowd2Bank\Handlers\UserEventHandler@getId');
    }

    public function getId($user)
    {
        return $user->id;
    }

}