<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersProfile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_profile', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('users_id')->unsigned();			
			$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_profile');
	}

}
