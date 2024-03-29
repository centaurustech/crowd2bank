<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->index('id');
			$table->index('user_id');

			$table->text('first_name', 60);
			$table->text('last_name', 60);
			$table->text('contact_number', 20);
			$table->mediumText('company');
			$table->timestamps();
		});

		Schema::table('user_profiles', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_profiles', function(Blueprint $table) {
			$table->dropForeign('user_profiles_user_id_foreign');
		});
		Schema::drop('user_profiles');
	}

}
