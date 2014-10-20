<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_details', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->index('id');

			$table->integer('project_id')->unsigned();
			$table->index('project_id');

			$table->longText('full_description');
			$table->integer('facebook_count')->unsigned();
			$table->integer('twitter_count')->unsigned();
			$table->timestamps();
		});

		Schema::table('project_details', function(Blueprint $table) {			
			$table->foreign('project_id')->references('id')->on('projects')
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
		Schema::table('project_details', function(Blueprint $table) {
			$table->dropForeign('project_details_project_id_foreign');
		});		
		Schema::drop('project_details');
	}

}
