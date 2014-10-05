<?php

class CreateFundsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Seeding: CreateFundsSeeder Class...');

		//set variable for faker class
		$faker = Faker\Factory::create();

		DB::table('funds')->delete();

		$count_users    = DB::table('user_profiles')->count();	
		$count_projects = DB::table('projects')->count();
		
		$account_type = ['bank', 'paypal'];
		
		for ($i = 0; $i < $count_projects; $i++) {

			$random_limit = rand(5, 15);

			$this->command->info('->project number: ' . $i . ', random limit of users for funds: ' . $random_limit);


			for ($x = 0; $x < $random_limit; $x++) { 
				$random_user_id    = mt_rand(1, $count_users);
				$random_project_id = mt_rand(1, $count_projects);

				$funds = [
					'user_profile_id' => $random_user_id,
					'project_id'      => $random_project_id,
					'pledge_amount'   => $faker->numberBetween($min = 70, $max = 125),
					'account_type'    => $account_type[array_rand($account_type)],
					'created_at'      => new DateTime,
					'updated_at'      => new DateTime
				];

				// insert the data in user profiles
				DB::table('funds')->insert($funds);
			}


		}

	}

}
