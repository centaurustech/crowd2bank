<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundsAndBackersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('funds', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->index('id');

			$table->integer('user_profile_id')->unsigned();
			$table->index('user_profile_id');

			$table->integer('project_id')->unsigned();
			$table->index('project_id');

			$table->integer('pledge_amount')->unsigned()->default(0);
			$table->string('account_type');
			$table->timestamps();
		});

		Schema::table('funds', function(Blueprint $table) {

			$table->foreign('user_profile_id')->references('id')->on('user_profiles')
				->onDelete('no action')->onUpdate('no action');

			$table->foreign('project_id')->references('id')->on('projects')
				->onDelete('no action')->onUpdate('no action');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('funds', function(Blueprint $table) {
			$table->dropForeign('funds_user_profile_id_foreign');
			$table->dropForeign('funds_project_id_foreign');
		});		
		Schema::drop('funds');
	}

}
