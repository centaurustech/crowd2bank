<?php namespace Crowd2Bank;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    public function register()
    {
        $app = $this->app;

        // Event
        $app->events->subscribe(new \Crowd2Bank\Handlers\UserEventHandler);

        // Service Providers
        $app->bind('\Crowd2Bank\Repo\User\UserRepositoryInterface', '\Crowd2Bank\Repo\User\UserRepository');
    }

}