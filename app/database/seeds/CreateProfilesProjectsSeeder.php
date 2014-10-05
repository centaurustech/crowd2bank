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

			$target_date = ['2014-09-01 22:09:01', '2014-10-27 16:52:20', '2014-09-01 12:31:43', '2014-10-18 09:41:39',
							'2014-09-09 12:32:24','2014-10-15 23:25:59','2014-09-08 01:33:25','2014-10-30 14:11:11',
							'2014-09-07 11:13:13'];

			$random_index = array_rand($target_date);
			$date = new DateTime($target_date[$random_index]);

			return $date->format('Y-m-d H:i:s');
		}

		// create a dummy image for project
		function getThumbnail() {
			
			$thumbnail = ['image-1.jpg', 'image-2.jpg', 'image-3.jpg', 'image-5.jpg',
							'image-6.jpg', 'image-7.jpg', 'image-8.jpg', 'image-9.jpg' ];

			return $thumbnail[array_rand($thumbnail)];
		}

		//set variable for faker class
		$faker = Faker\Factory::create();

		// clean the data first
	    DB::table('projects')->delete();
	    DB::table('user_profiles')->delete();

		// set required limit for users
		$user_limit = 20;

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

			// set random limit of projects per user_id
			$random_limit = rand(7, 9);

			$this->command->info('->current number of user (' . $i . '/ ' . $user_limit . ' )'); 

			// set the random limit of projects per user
			for ($a = 0; $a < $random_limit; $a++) {

				$this->command->info('-->random number of projects per user id (' . $a . '/ ' . $random_limit . ' )'); 

				// prepare data for projects table
				$project = [
					'title'             => $faker->text($maxNbChars = 25),
					'short_description' => $faker->text($maxNbChars = 200),
					'thumbnail'         => getThumbnail(),
					'target_fund'       => $faker->numberBetween($min = 850, $max = 2450),
					'target_date'       => setDate(),
					'user_id'           => $user_id,
					'created_at'        => new DateTime,
					'updated_at'        => new DateTime
				];

				// insert the data in user profiles
				DB::table('projects')->insert($project);

			}
		}
	}

}
