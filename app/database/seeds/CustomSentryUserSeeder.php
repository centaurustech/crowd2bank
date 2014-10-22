<?php

class CustomSentryUserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Seeding: CustomSentryUserSeeder Class...');

		DB::table('users')->delete();

	    Sentry::getUserProvider()->create(array(
			'email'      => 'admin@admin.com',
			'username'   => 'admin@admin.com',
			'password'   => 'admin@admin.com',
			'activated'  => 1,
	    ));
	}

}