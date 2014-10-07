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
	function getThumbnail() {		
		$thumbnail = ['image-1.jpg', 'image-2.jpg', 'image-3.jpg', 'image-5.jpg', 'image-5.jpg',
						'image-6.jpg', 'image-7.jpg', 'image-8.jpg', 'image-9.jpg' ];
		return $thumbnail[array_rand($thumbnail)];
	}

	$dummyDir             = public_path() . '\assets\images\dummy\projects';
	$mainPath             = public_path() . '\uploads';
	$randomThumbnail      = getThumbnail();
	$randomDummyThumbnail = $dummyDir . '\\' . $randomThumbnail;
	
	$projects             = $mainPath . '\projects';		
	$thumbnails           = $mainPath . '\thumbnails';
	
	$username             = 'aldren.terante';
	$newFileName          = date('YmdHis') . '-' .$randomThumbnail;
	
	$newDirectory         = $projects . '\\' . $username;
	$oldFile              = $randomDummyThumbnail;
	$newFile              = $newDirectory . '\\' . $newFileName;
	
	File::makeDirectory($newDirectory, 0777, true, true);
	File::copy($oldFile, $newFile);

	$link = URL::to('/') . '/uploads/projects/' . $username . '/' . $newFileName;
	return [
		'oldFile' => $oldFile,
		'newFile' => $newFile,
		'link' => $link
	];

	// $newDir   = $mainPath . $username;
	// $requireDir = ['thumbnails', 'projects'];
	// $limit = count($requireDir);

	// File::cleanDirectory($mainPath);

	// for ($i = 0; $i < $limit; $i++) { 
	// 	$directory = $newDir . '\\' . $requireDir[$i];		
	// 	File::makeDirectory($directory, 0777, true, true);
	// }
	
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
