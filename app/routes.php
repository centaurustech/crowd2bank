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
	$id = 12;
	$user = Profile::where('user_id', '=', $id)->get(['first_name', 'last_name', 'contact_number', 'company']);
	

	if ( isset($user[0]) ) // check if session id is exist on profiles database
	{
		// set the object to array 
		$user = $user[0]->toArray();
		$data = [];

		// push all array value to a array
		foreach ($user as $key => $value) {
			array_push($data, $value);
		}

		if (in_array('', $data)) // check if all require fields are completed
		{
		    echo 'please complete your profile information first';
		}
		else
		{
			echo 'true';
		}
	}
	else //check if session id is not exist on profiles database
	{
		echo 'please complete your profile information first';
	}


}));


Route::group(array('before' => 'Sentinel\auth'), function()
{
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

Route::get('single-page/{id}', array('uses' => 'Crowd2Bank\Repos\Projects\ProjectsController@singlePage',
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
