<?php namespace Crowd2Bank\Handlers;

use Cartalyst\Sentry\Sentry,
    Profile, Project;

use Session, Response, Mail;

class UserEventHandler {

    protected $profile;
    protected $project;

    public function __construct(Profile $profile, Project $project)
    {
        $this->profile = $profile;
        $this->project = $project;
    }


    public function subscribe($events)
    {
        $events->listen('sentinel.user.registered', 'Crowd2Bank\Handlers\UserEventHandler@notifitionEmailForAdmin');
        $events->listen('sentinel.user.login', 'Crowd2Bank\Handlers\UserEventHandler@getSessionLogin');
    }

    public function getSessionLogin($user)
    {
         $id             = $user->id;
         $profile        = $this->profile->find($id);
         $project        = $this->project->find($id);
         
         $first_name     = ucfirst($profile->first_name);
         $last_name      = ucfirst($profile->last_name);
         $fullname       =  $first_name . ' ' . $last_name;
         
         $total_projects = $profile->projects->count();
         $total_backers  = $project->funds->count();
         
         Session::put('user.id', $id);
         Session::put('user.username', $user['username']);
         Session::put('user.fullname', $fullname);
         Session::put('user.email', $user['email']);
         Session::put('user.contact', $profile->contact_number);
         Session::put('user.company', $profile->company);
         Session::put('user.total_projects', $total_projects);
         Session::put('user.total_backers', $total_backers);
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