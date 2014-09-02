<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RearrangeColumnsUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement("ALTER TABLE users MODIFY COLUMN company VARCHAR(255) AFTER last_name");
		DB::statement("ALTER TABLE users MODIFY COLUMN contact VARCHAR(255) AFTER last_name");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement("ALTER TABLE users MODIFY COLUMN company VARCHAR(255) AFTER updated_at");
		DB::statement("ALTER TABLE users MODIFY COLUMN contact VARCHAR(255) AFTER updated_at");
	}

}
