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

Route::get('test', array( 'as' => 'test', function()
{
	return DB::table('funds')->select(DB::raw('
								DISTINCT(project_id),
								SUM(pledge_amount),
								COUNT(user_profile_id)
							'))
							->where(function($query){
									$query->where('project_id', '=', 7);
								})->paginate(1);	

}));


Route::group(array('before' => 'Sentinel\auth'), function()
{
	Route::get('profile', array('uses' => 'Crowd2Bank\Repos\Users\UsersController@getProfile',
								'as' => 'profile'));

	Route::get('dashboard', array('uses' => 'Crowd2Bank\Repos\Users\UsersController@getProfile',
								'as' => 'dashboard'));

	Route::get('create-a-project', array('uses' => 'Crowd2Bank\Repos\Users\UsersController@createProject',
										'as' => 'create-a-project'));
});

Route::get('/', array('uses' => 'Crowd2Bank\Repos\Projects\ProjectsController@index',
									'as' => 'home'));

Route::get('browse-a-project', array('uses' => 'Crowd2Bank\Repos\Projects\ProjectsController@getAllProjects',
									'as' => 'browse-a-project'));

Route::get('pledge-a-project', array('uses' => 'Crowd2Bank\Repos\Projects\ProjectsController@pledgeAProject',
									'as' => 'pledge-a-project'));

Route::get('single-page/{cat}/{id}', array('uses' => 'Crowd2Bank\Repos\Projects\ProjectsController@singlePage',
									'as' => 'single-page'))->where('id', '[0-9]+');

/*--------------------------------------------------------------------------
 --------------------------------------------------------------------------*/

Route::get('current-projects', array( 'as' => 'about', function()
{
	return View::make('about');
}));

Route::get('about', array( 'as' => 'about', function()
{
	return View::make('about');
}));

Route::get('terms-and-conditions', array( 'as' => 'terms-and-conditions', function()
{
	return View::make('terms-and-conditions');
}));

Route::get('faq', array( 'as' => 'faq', function()
{
	return View::make('faq');
}));

Route::get('contact-us', array( 'as' => 'contact-us', function()
{
	return View::make('contact-us');
}));
