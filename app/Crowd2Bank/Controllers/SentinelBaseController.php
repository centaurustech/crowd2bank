<?php namespace Crowd2Bank\Controllers;

use Sentinel\UserController;
use Sentinel\Repo\Group\SentryGroup;

// Parent class' dependencies
use Sentinel\Repo\User\UserInterface;
use Sentinel\Repo\Group\GroupInterface;
use Sentinel\Service\Form\Register\RegisterForm;
use Sentinel\Service\Form\User\UserForm;
use Sentinel\Service\Form\ResendActivation\ResendActivationForm;
use Sentinel\Service\Form\ForgotPassword\ForgotPasswordForm;
use Sentinel\Service\Form\ChangePassword\ChangePasswordForm;
use Sentinel\Service\Form\SuspendUser\SuspendUserForm;
use \BaseController, \View, \Input, \Event, \Redirect, \Session, \Config;


class SentinelBaseController extends BaseController {
    
    // Injecting both the parent class' dependencies and my new dependency into the constructor
    public function __construct(UserInterface $user,
    							GroupInterface $group,
    							RegisterForm $registerForm,
    							UserForm $userForm,
    							ResendActivationForm $resendActivationForm,
    							ForgotPasswordForm $forgotPasswordForm,
    							ChangePasswordForm $changePasswordForm,
								SuspendUserForm $suspendUserForm)
    {
        // passing the injected variables to the parent constructor call
        parent::__construct($user,
                            $group,
                            $registerForm,
                            $userForm,
                            $resendActivationForm,
                            $forgotPasswordForm,
                            $changePasswordForm,
                            $suspendUserForm);

    }

}