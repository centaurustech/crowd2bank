<?php namespace Crowd2Bank\Handlers;

use Cartalyst\Sentry\Sentry;
use Session, Response, Mail;

class UserEventHandler {

    public function subscribe($events)
    {
        $events->listen('sentinel.user.registered', 'Crowd2Bank\Handlers\UserEventHandler@notifitionEmailForAdmin');
        $events->listen('sentinel.user.login', 'Crowd2Bank\Handlers\UserEventHandler@getSessionLogin');
    }

    public function getSessionLogin($data)
    {

        $first_name = ucfirst($data['first_name']);
        $last_name  = ucfirst($data['last_name']);
        $fullname   =  $first_name . ' ' . $last_name;

        Session::put('user.username', $data['username']);
        Session::put('user.fullname', $fullname);
        Session::put('user.email', $data['email']);
        Session::put('user.contact', $data['contact']);
        Session::put('user.company', $data['company']);
        
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