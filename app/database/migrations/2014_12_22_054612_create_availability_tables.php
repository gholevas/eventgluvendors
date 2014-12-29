<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailabilityTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pricing_day', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->integer('day');
			$table->integer('from');
			$table->integer('to');
			$table->integer('duration');
			$table->decimal('min_price', 10, 2);

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('pricing_date', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->integer('date'); // TS of the start of the day
			$table->integer('from');
			$table->integer('to');
			$table->integer('duration');
			$table->decimal('min_price', 10, 2);

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
