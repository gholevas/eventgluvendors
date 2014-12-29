<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('todo_lists')->truncate();
		DB::table('menu_extras')->truncate();
		DB::table('menus')->truncate();
		DB::table('addons')->truncate();
		DB::table('rooms')->truncate();
		DB::table('venues')->truncate();
		DB::table('events')->truncate();

		$this->call('VenueSeeder');
		$this->call('AdminSeeder');
		//$this->call('MenuSeeder');
		$this->call('CentralOptionsSeeder');
		
		$this->command->info('Admin User created with username admin@admin.com and password admin');
	}

}
