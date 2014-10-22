<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CustomSentryGroupSeeder');
		$this->call('CustomSentryUserSeeder');
		$this->call('CustomSentryUserGroupSeeder');

		$this->call('CreateProjectStatusSeeder');
		$this->call('CreateProfilesProjectsSeeder');		
		$this->call('CreateFundsSeeder');		
		$this->call('CreateProjectsDetailsSupports');		

	}

}
