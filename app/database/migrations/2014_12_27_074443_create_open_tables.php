<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('closed_day', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->integer('room_id')->unsigned();
			$table->foreign('room_id')->references('id')->on('rooms');

			$table->integer('day');

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('closed_date', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->integer('room_id')->unsigned();
			$table->foreign('room_id')->references('id')->on('rooms');

			$table->integer('date'); // TS of the start of the day

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
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
