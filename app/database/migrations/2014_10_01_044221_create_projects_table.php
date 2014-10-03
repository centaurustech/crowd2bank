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
		Schema::create('projects', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->index('id');

			$table->integer('user_id')->unsigned();
			$table->index('user_id');

			$table->string('title', 80);
			$table->mediumText('short_description');			
			$table->string('thumbnail', 120);
			$table->integer('target_fund')->unsigned()->default(0);
			$table->dateTime('target_date');
			$table->timestamps();
		});

		Schema::table('projects', function(Blueprint $table) {			
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects', function(Blueprint $table) {
			$table->dropForeign('projects_user_id_foreign');
		});		
		Schema::drop('projects');
	}

}
