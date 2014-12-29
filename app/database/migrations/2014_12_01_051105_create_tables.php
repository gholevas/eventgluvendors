<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venues', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('name');

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('menus', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->integer('type'); // 0 for food, 1 for drink
			$table->string('name');
			$table->decimal('min_price', 10, 2);
			$table->text('description');

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('todo_lists', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->text('todo');
			$table->integer('completed_at');

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('clients', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->string('first_name');
			$table->string('last_name');
			$table->string('phone_number');
			$table->string('secondary_phone_number');
			$table->string('fax_number');
			$table->string('email');
			$table->string('address');

			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->string('country');
			$table->string('source');

			$table->string('notes');

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('events', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients');

			$table->integer('guests_adults');
			$table->integer('guests_kids');
			$table->string('date');
			$table->integer('length');

			$table->integer('start_time');
			$table->integer('end_time');

			$table->string('title');
			$table->string('type');

			$table->integer('room_id')->unsigned();
			$table->integer('food_option')->unsigned()->nullable();
			$table->integer('drink_option')->unsigned()->nullable(); // decide how to handle no food/drink options
			$table->integer('food_option_kids')->unsigned()->nullable();
			$table->integer('drink_option_kids')->unsigned()->nullable();

			$table->foreign('food_option')->references('id')->on('menus');
			$table->foreign('drink_option')->references('id')->on('menus');
			$table->foreign('food_option_kids')->references('id')->on('menus');
			$table->foreign('drink_option_kids')->references('id')->on('menus');

			$table->text('food_option_extras');
			$table->text('drink_option_extras'); // serialized [[id,name,price],...] array - need to save this info so quote doesnt change
			$table->text('food_option_kids_extras');
			$table->text('drink_option_kids_extras');
			$table->text('addons');

			$table->decimal('total_price', 10, 2);
			$table->decimal('price_per_person', 10, 2);
			$table->decimal('tax', 10, 2);
			$table->decimal('gratuity', 10, 2);
			$table->decimal('balance_paid', 10, 2);
			$table->boolean('confirmed');
			$table->decimal('discount', 10, 2);
			$table->decimal('discount_percent', 10, 2);
			$table->decimal('deposit', 10, 2);
			$table->integer('due_by');

			// The two parameters the central manager mentioned
			$table->boolean('dance_floor');
			$table->boolean('buffet');

			$table->text('notes')->nullable();

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('rooms', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->string('name');
			$table->decimal('min_price', 10, 2);

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('room_pictures', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('room_id')->unsigned();
			$table->foreign('room_id')->references('id')->on('rooms');

			$table->string('name');
			$table->string('path');
			$table->string('caption', 255);

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('gallery', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->string('name');
			$table->string('path');
			$table->string('caption', 255);

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('marketplace_views', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->string('ip'); // should be bigint... will refactor everything after we finish the initial crappy version
			$table->integer('time'); // should be timestamp

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('event_notes', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');

			$table->string('note');

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('event_payment', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');

			$table->decimal('deposit', 10, 2);
			$table->decimal('paid', 10, 2);

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('menu_extras', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('menu_id')->unsigned();
			$table->foreign('menu_id')->references('id')->on('menus');

			$table->string('name');
			$table->string('description');
			$table->decimal('price', 10, 2);

			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->softDeletes();
		});

		Schema::create('addons', function($table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');

			$table->integer('venue_id')->unsigned();
			$table->foreign('venue_id')->references('id')->on('venues');

			$table->string('name');
			$table->string('description');
			$table->decimal('price', 10, 2);

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
