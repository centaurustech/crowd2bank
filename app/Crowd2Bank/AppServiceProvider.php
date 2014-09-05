<?php namespace Crowd2Bank;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	protected $defer = true;

    public function register()
    {
        // Service Providers
        $this->app->bind('\Crowd2Bank\Repos\Users\UserRepositoryInterface', '\Crowd2Bank\Repos\Users\UserRepository');
        $this->app->bind('\Crowd2Bank\Repos\Projects\ProjectsRepositoryInterface', '\Crowd2Bank\Repos\Projects\ProjectsRepository');
    }

}