<?php

Route::get('/event/{event_id}', function($event_id)
{
	$event = ClientEvent::find($event_id);
	$client = Client::withTrashed()->find($event->client_id);
	$room = Room::withTrashed()->find($event->room_id);

	$set_confirmed = false;
	if (Input::has('confirm'))
	{
		$event->confirmed = 1;
		$event->save();
		$set_confirmed = true;
	}

	if ($event->venue_id != Sentry::getUser()->venue_id)
	{
		App::abort(403, 'You do not have access to view this event.');
	}

	$rooms = Room::where('venue_id', Sentry::getUser()->venue_id)->get();
	$food_options = Menu::where('venue_id', Sentry::getUser()->venue_id)
							->where('type', 0)
							->get();
	$drink_options = Menu::where('venue_id', Sentry::getUser()->venue_id)
							->where('type', 1)
							->get();
	$addons = Addon::where('venue_id', Sentry::getUser()->venue_id)->get();
	$venue = Venue::find(Sentry::getUser()->venue_id);

	$notes = EventNote::where('event_id', $event_id)->get();

	// Get the food extras string
	$food_extras = unserialize($event->food_option_extras);
	$food_extra_string = '';
	if (is_array($food_extras))
	{
		foreach ($food_extras as $extra)
		{
			$food_extra_string .= $extra['id'] . ':' . $extra['name'] . ' $' . $extra['price'] . 'pp,';
		}
		$food_extra_string = rtrim($food_extra_string, ',');
	}

	// Get the kid food extras string
	$food_extras_kids = unserialize($event->food_option_kids_extras);
	$food_extra_kids_string = '';
	if (is_array($food_extras_kids))
	{
		foreach ($food_extras_kids as $extra)
		{
			$food_extra_kids_string .= $extra['id'] . ':' . $extra['name'] . ' $' . $extra['price'] . 'pp,';
		}
		$food_extra_kids_string = rtrim($food_extra_kids_string, ',');
	}

	// Get the drink extras string
	$drink_extras = unserialize($event->drink_option_extras);
	$drink_extra_string = '';
	if (is_array($drink_extras))
	{
		foreach ($drink_extras as $extra)
		{
			$drink_extra_string .= $extra['id'] . ':' . $extra['name'] . ' $' . $extra['price'] . 'pp,';
		}
		$drink_extra_string = rtrim($drink_extra_string, ',');
	}

	// Get the kid drink extras string
	$drink_extras_kids = unserialize($event->drink_option_kids_extras);
	$drink_extra_kids_string = '';
	if (is_array($drink_extras_kids))
	{
		foreach ($drink_extras_kids as $extra)
		{
			echo "1<br>";
			$drink_extra_kids_string .= $extra['id'] . ':' . $extra['name'] . ' $' . $extra['price'] . 'pp,';
		}
		$drink_extra_kids_string = rtrim($drink_extra_kids_string, ',');
	}

	return View::make('admin.eventdetail')->with('rooms', $rooms)
									->with('food_options', $food_options)
									->with('drink_options', $drink_options)
									->with('addons', $addons)
									->with('event', $event)
									->with('client', $client)
									->with('event_notes', $notes)
									->with('room', $room)
									->with('venue', $venue)
									->with('food_extra_string', $food_extra_string)
									->with('drink_extra_string', $drink_extra_string)
									->with('food_extra_kids_string', $food_extra_kids_string)
									->with('drink_extra_kids_string', $drink_extra_kids_string)
									->with('set_confirmed', $set_confirmed);
});