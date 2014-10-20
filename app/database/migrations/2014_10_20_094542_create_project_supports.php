<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSupports extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_supports', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->index('id');

			$table->integer('project_id')->unsigned();
			$table->index('project_id');

			$table->integer('amount')->unsigned();
			$table->longText('details');
			$table->timestamps();
		});

		Schema::table('project_supports', function(Blueprint $table) {			
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
		Schema::table('project_supports', function(Blueprint $table) {
			$table->dropForeign('project_supports_project_id_foreign');
		});		
		Schema::drop('project_supports');
	}

}
