<?php namespace Crowd2Bank\Handlers;

use Cartalyst\Sentry\Sentry;
use Response, Mail;

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

        $email_data = array(
            'recipient' => 'dev@crowd2bank.com',
            'subject' => 'Crowd2Bank: Newly Register Notification'
        );

        $view_data = array(
            'name'     => ucfirst($data->first_name) . ' ' . ucfirst($data->last_name),
            'contact'  => $data->contact,
            'company'  => $data->company,
            'email'    => $data->email,
            'username' => $data->username,
        );

        Mail::queue('emails.admin-notification-register', $view_data, function($message) use ($email_data) {
            $message->to( $email_data['recipient'] )
                    ->subject( $email_data['subject'] );
        });

    }

}