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
			'email'      => 'aldren.terante@gmail.com',
			'username'   => 'aldren.terante',
			'password'   => 'aldren.terante',
			'activated'  => 1,
	    ));
	}

}