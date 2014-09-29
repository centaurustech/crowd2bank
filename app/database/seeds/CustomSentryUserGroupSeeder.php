<?php

class CustomSentryUserGroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->command->info('Seeding: CustomSentryUserGroupSeeder Class...');

		DB::table('users_groups')->delete();


		$adminUser = Sentry::getUserProvider()->findByLogin('aldren.terante@gmail.com');

		$userGroup = Sentry::getGroupProvider()->findByName('Users');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admins');

	    // Assign the groups to the users

	    $adminUser->addGroup($userGroup);
	    $adminUser->addGroup($adminGroup);

	}

}