<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', array('as' => 'home', function()
{
    return View::make('index');
}));

Route::get('browse-a-project', array( 'as' => 'browse-a-project', function()
{
	return View::make('browse-a-project');
}));

Route::get('about', array( 'as' => 'about', function()
{
	return View::make('about');
}));

Route::get('single-page', array( 'as' => 'single-page', function()
{
	return View::make('single-page');
}));



Route::group(array('before' => 'Sentinel\auth'), function()
{
	Route::get('profile', array('uses' => 'Crowd2Bank\Controllers\UserController@getProfile',
								'as' => 'profile'));

	Route::get('dashboard', array('uses' => 'Crowd2Bank\Controllers\UserController@getProfile',
								'as' => 'dashboard'));

	Route::get('create-a-project', array('uses' => 'Crowd2Bank\Controllers\UserController@createProject',
										'as' => 'create-a-project'));
});