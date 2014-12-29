<?php

class VenueSeeder extends Seeder {

	public function run()
	{
		$venue = new Venue();
		$venue->name = "Central Lounge";
		$venue->save();	

		$room = new Room();
		$room->venue_id = $venue->id;
		$room->name = "Main Room";
		$room->min_price = 3000.00;
		$room->save();

		$room = new Room();
		$room->venue_id = $venue->id;
		$room->name = "Ammos";
		$room->min_price = 2000.00;
		$room->save();

		$room = new Room();
		$room->venue_id = $venue->id;
		$room->name = "Courtyard";
		$room->min_price = 1000.00;
		$room->save();
	}
}