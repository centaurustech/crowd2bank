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


	//return View::make('test');
	$faker = Faker\Factory::create();
	echo '<pre>';
	$thumbnail = [
		'image-1.jpg',
		'image-2.jpg',
		'image-3.jpg',
		'image-5.jpg',
		'image-6.jpg',
		'image-7.jpg',
		'image-8.jpg',
		'image-9.jpg'
	];
	$target_date = [
		'2014-09-01 22:09:01',
		'2014-10-27 16:52:20',
		'2014-09-01 12:31:43',
		'2014-10-18 09:41:39',
		'2014-09-09 12:32:24',
		'2014-10-15 23:25:59',
		'2014-09-08 01:33:25',
		'2014-10-30 14:11:11',
		'2014-09-07 11:13:13'
	];
	
	for ($i = 0; $i < 100; $i++) {

		// create sentry user

		$first_name = $faker->firstName($gender = null|'male'|'female');
		$last_name  = $faker->lastName;
		
		$username = strtolower($first_name) . '.' . strtolower($last_name);
		$email    =  $username. '@gmail.com';

	    Sentry::getUserProvider()->create(array(
	        'email'    => $email,
	        'username' => $username,
	        'password' => 'sentrytest',
	        'activated' => 1,
	    ));

	    $userUser = Sentry::getUserProvider()->findByLogin($email);
	    $userGroup = Sentry::getGroupProvider()->findByName('Users');
	    $userUser->addGroup($userGroup);




/*
		$array = [
			'project' => [
				'id'          => $i + 1,
				'title'       => $faker->text($maxNbChars = 25),
				'short_desc'  => $faker->text($maxNbChars = 200),
				'target_fund' => $faker->numberBetween($min = 2500, $max = 9000),
				'target_date' => array_rand($target_date),
				'total_funds' => $faker->numberBetween($min = 500, $max = 12250),
				'thumbnail'   => array_rand($thumbnail),
				'user_id'     => '',
			],
			'profile' => [
				'id'          => $i + 1,
				'first_name'  => $first_name,
				'last_name'   => $last_name,
				'contact_number' => $faker->numerify($string = '###########'),
				'company'     => $faker->company . ' ' . $faker->companySuffix,
				'user_id'     => '',
			],
		];
 */

	}


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
