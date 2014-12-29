<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SoftDeleteUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Update the users table
		Schema::table('users', function(Blueprint $table)
		{
			//
			$table->softDeletes();

			// Assign each user to a venue
			// Don't bother with foreign keys for now while testing, since venues table may be empty and we still wanna be able to login
			$table->integer('venue_id')->unsigned();
			//$table->foreign('venue_id')->references('id')->on('venues');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Update the users table
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('deleted_at');
			
		});
	}

}