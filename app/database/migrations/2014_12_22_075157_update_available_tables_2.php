<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAvailableTables2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pricing_day', function($table)
		{
			$table->integer('room_id')->unsigned();
			$table->foreign('room_id')->references('id')->on('rooms');
		});

		Schema::table('pricing_date', function($table)
		{
			$table->integer('room_id')->unsigned();
			$table->foreign('room_id')->references('id')->on('rooms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
