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
	        'email'    => 'admin@admin.com',
	        'username' => 'admin',
	        'password' => 'sentryadmin',
	        'activated' => 1,
	    ));

	    Sentry::getUserProvider()->create(array(
	        'email'    => 'user@user.com',
	        'username' => '',
	        'password' => 'sentryuser',
	        'activated' => 1,
	    ));

	    Sentry::getUserProvider()->create(array(
			'email'      => 'aldren.terante@gmail.com',
			'username'   => 'aldren.terante',
			'password'   => 'aldren.terante',
			'activated'  => 1,
	    ));
	}

}