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

		//set variable for faker class
		$faker = Faker\Factory::create();

	    DB::table('projects')->delete();
	    DB::table('user_profiles')->delete();

		//converting string to date;
		function setDate() {

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

			$random_index = array_rand($target_date);
			$date = new DateTime($target_date[$random_index]);

			// $timestamp = $date->getTimestamp();
			// $format = $date->format('Y-m-d H:i:s');
			// return [$timestamp, $format];
			return $date->format('Y-m-d H:i:s');
		}


		function getThumbnail() {
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
			return $thumbnail[array_rand($thumbnail)];
		}

		// loop for require number of users
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

		    $user_id = $userUser['attributes']['id'];
			$user_profiles = [
				'user_id'        => $user_id,
				'first_name'     => $first_name,
				'last_name'      => $last_name,
				'contact_number' => $faker->numerify($string = '############'),
				'company'        => $faker->company . ' ' . $faker->companySuffix,
				'created_at'     => new DateTime,
				'updated_at'     => new DateTime
			];
			DB::table('user_profiles')->insert($user_profiles);

			$random_limit = rand(3, 7);			
			for ($a = 0; $a < $random_limit; $a++) { 
				$project = [
					'title'              => $faker->text($maxNbChars = 25),
					'short_description'  => $faker->text($maxNbChars = 200),
					'thumbnail'          => getThumbnail(),
					'target_fund'        => $faker->numberBetween($min = 2500, $max = 9000),
					'target_date'        => setDate(),
					'user_id'            => $user_id,
					'created_at'         => new DateTime,
					'updated_at'         => new DateTime
				];
				DB::table('projects')->insert($project);	
			}
		}
	}

}
