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
	// $activeProjects = Project::where('activated', '=', 1)->get(['id', 'user_id']);

	// foreach ($activeProjects as $key => $value) {
	// 	$data[$key] = [
	// 		'project_id' => $value->id,
	// 		'user_id' => $value->user_id,
	// 	];
	// }

	// $totalProjects = count($data) - 1;

	// $randomKey = mt_rand(0, $totalProjects);

	// return $data[$randomKey];

	$notActive = DB::table('funds')
					->join('projects', 'funds.project_id', '=', 'projects.id')
					->select('funds.id')
					->where('projects.activated', '=', 0)
					->get(['funds.id']);

	echo 'Before Deletion: ' . DB::table('funds')->count();

	foreach ($notActive as $key => $value) {
		DB::table('funds')->where('funds.id', '=', $value->id)->delete();
		echo 'deleting fund id number: ' . $value->id;
	}
	
	echo 'After Deletion: ' . DB::table('funds')->count();

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
