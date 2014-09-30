<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('short_description');
			$table->string('full_description');
			$table->integer('target_fund')->default(0);
			$table->string('thumbnail');
			$table->integer('target_fund')->default(0);
			$table->timestamp('target_date');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->timestamp();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
