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
	$id            = Session::get('user.id');
	$project       = Fund::where('user_profile_id', '=', $id)->get()->first();
	
	$user_id       = $project->user_profile_id;
	$project_id    = $project->project_id;
		
	$profile       = Profile::where('user_id', '=', $user_id)->get()->first();
	$project       = Project::where('id', '=', $project_id)->get()->first();
	
	$title_project = $project->title;
	$status        = $project->target_date;
	$date          = $project->target_date;
	$project_by    = $profile->first_name . ' ' . $profile->last_name;

	return [$title_project, $status, $date, $project_by];

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
