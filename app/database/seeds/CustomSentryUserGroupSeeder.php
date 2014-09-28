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

		$userUser = Sentry::getUserProvider()->findByLogin('user@user.com');
		$adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');
		$adminAldren = Sentry::getUserProvider()->findByLogin('aldren.terante@gmail.com');

		$userGroup = Sentry::getGroupProvider()->findByName('Users');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admins');

	    // Assign the groups to the users
	    $userUser->addGroup($userGroup);

	    $adminUser->addGroup($userGroup);
	    $adminUser->addGroup($adminGroup);

	    $adminAldren->addGroup($adminGroup);
	    $adminAldren->addGroup($adminGroup);
	}

}