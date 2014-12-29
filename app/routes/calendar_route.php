<?php

Route::get('/calendar/{room_id}', function($room_id)
{
	$rooms = Room::where('venue_id', Sentry::getUser()->venue_id)->get();

	$food_options = Menu::where('venue_id', Sentry::getUser()->venue_id)
							->where('type', 0)
							->get();
	$drink_options = Menu::where('venue_id', Sentry::getUser()->venue_id)
							->where('type', 1)
							->get();
	$addons = Addon::where('venue_id', Sentry::getUser()->venue_id)->get();

	$venue = Venue::find(Sentry::getUser()->venue_id);

	$room = Room::find($room_id);
	if ($room->venue_id != Sentry::getUser()->venue_id)
	{
		App::abort(403, 'You do not have access to view this room\'s calendar.');
	}

	$day_pricing_arr = array();
	$closed_arr = array();
	for ($i = 0; $i < 7; $i++)
	{
		$day_pricing = PricingDay::where('room_id', $room_id)
								->where('day', $i)
								->orderBy(DB::raw('`to`-`from`'), 'desc') // get the largest time range for this day
								->first();

		$closed_rows = ClosedDay::where('room_id', $room_id)
						   ->where('day', $i)
						   ->get();
		$closed = (count($closed_rows) != 0);

		if (empty($day_pricing))
		{
			//$day_pricing_arr[$i] = '';
		}
		 else
		{
			$day_pricing_arr[$i] = $day_pricing->min_price;
		}

		$closed_arr[$i] = $closed;
	}

	return View::make('admin.calendar')->with('room_id', $room_id)
									->with('rooms', $rooms)
									->with('food_options', $food_options)
									->with('drink_options', $drink_options)
									->with('addons', $addons)
									->with('venue', $venue)
									->with('room', $room)
									->with('day_pricing_arr', $day_pricing_arr)
									->with('closed_arr', $closed_arr);
});