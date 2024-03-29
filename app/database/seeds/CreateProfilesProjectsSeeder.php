<?php

class CreateProfilesProjectsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Seeding: CreateProfilesProjectsSeeder Class...');

		//converting string to date;
		function setDate() {

			$min_date = '2014-09-01 00:00:00';
			$max_date = '2014-10-31 00:00:00';

		    $min_epoch = strtotime($min_date);
		    $max_epoch = strtotime($max_date);

		    $rand_epoch = rand($min_epoch, $max_epoch);

		    return date('Y-m-d H:i:s', $rand_epoch);
		}

		function getToday($date)
		{
			return $date->format('YmdHis');
		}

		// create a dummy image for project
		function getProjectsThumbnail() {
			
			$thumbnail = ['image-1.jpg', 'image-2.jpg', 'image-3.jpg', 'image-5.jpg',
							'image-6.jpg', 'image-7.jpg', 'image-8.jpg', 'image-9.jpg' ];

			return $thumbnail[array_rand($thumbnail)];
		}

		//set variable for faker class
		$faker = Faker\Factory::create();

		// clean the data first
	    DB::table('projects')->delete();
	    DB::table('user_profiles')->delete();

	    // delete all images folder
		$directory = public_path() . '/uploads/projects';
		File::deleteDirectory($directory, true);

		// set required limit for users
		$user_limit = 5;

		// loop for require number of users
		for ($i = 0; $i < $user_limit; $i++) {
			
			$first_name = $faker->firstName($gender = null|'male'|'female');
			$last_name  = $faker->lastName;			
			$username = strtolower($first_name) . '.' . strtolower($last_name);
			$email    =  $username. '@gmail.com';

			// create sentry user
		    Sentry::getUserProvider()->create(array(
		        'email'    => $email,
		        'username' => $username,
		        'password' => 'sentrytest',
		        'activated' => 1,
		    ));

		    // set default user property rights
		    $userUser = Sentry::getUserProvider()->findByLogin($email);
		    $userGroup = Sentry::getGroupProvider()->findByName('Users');
		    $userUser->addGroup($userGroup);

		    // get the user id for foreign key
		    $user_id = $userUser['attributes']['id'];

		    // prepare data for profiles table
			$user_profiles = [
				'user_id'        => $user_id,
				'first_name'     => $first_name,
				'last_name'      => $last_name,
				'contact_number' => $faker->numerify($string = '############'),
				'company'        => $faker->company . ' ' . $faker->companySuffix,
				'created_at'     => new DateTime,
				'updated_at'     => new DateTime
			];

			// insert the data in user profiles
			DB::table('user_profiles')->insert($user_profiles);

			// dummy thumbnail setup
			/*-------------------------------------------------------*/
			$projects    = public_path() . '/uploads/projects';
			$dummyDir    = public_path() . '/assets/images/dummy/projects';


			// set random limit of projects per user_id
			$random_limit = rand(7, 9);

			$this->command->info('->current number of user (' . $i . '/ ' . $user_limit . ' )'); 

			// set the random limit of projects per user
			for ($a = 0; $a < $random_limit; $a++) {

				$this->command->info('-->random number of projects per user id (' . $a . '/ ' . $random_limit . ' )'); 

				// create folder based on username
				$usernameDir = $projects;
				File::makeDirectory($usernameDir, 0777, true, true);
				/*-------------------------------------------------------*/

				$date = getToday(new DateTime);
				$thumbnail = getProjectsThumbnail();
				$link = URL::asset('uploads/projects') . '/' . $date . '/' . $thumbnail;



				// prepare data for projects table
				$project = [
					'title'             => $faker->text($maxNbChars = 25),
					'short_description' => $faker->text($maxNbChars = 200),
					'thumbnail'         => $link,
					'target_fund'       => $faker->numberBetween($min = 500, $max = 3000),
					'thumbnail'         => $link,
					'target_date'       => setDate(),
					'activated'         => rand(0, 1),
					'user_id'           => $user_id,
					'created_at'        => new DateTime,
					'updated_at'        => new DateTime
				];

				// insert the data in user profiles
				DB::table('projects')->insert($project);

				// create directory folder uploads/username/date
				$newDirectory = $usernameDir . '/' . $date;
				File::makeDirectory($newDirectory, 0777, true, true);

				// create a dummy thumbnail for the project
				$oldFile = $dummyDir . '/' . $thumbnail;
				$newFile = $newDirectory . '/' . $thumbnail;
				File::copy($oldFile, $newFile);

			}
		}
	}

}
