<?php

Route::any('/events/{type}/{sort?}/{search?}/{start_time?}/{end_time?}', function($type = 0, $sort = 'date', $search = NULL, $start_time = NULL, $end_time = NULL)
{
	// type - 0 = upcoming, 1 = upcoming lead, 2 = past event
	
	$deleted_event = false;
	if (Input::has('cancel'))
	{
		$event_del = ClientEvent::find(Input::get('cancel'));
		$event_del->delete();
		$deleted_event = true;
	}

	switch ($type)
	{
		case 0:
			$events_query = ClientEvent::where('confirmed', 1)
							->where('venue_id', Sentry::getUser()->venue_id);
							
			$event_type = 'Upcoming Event';
			$lead = false;
			break;

		case 1:
			$events_query = ClientEvent::where('confirmed', 0)
							->where('venue_id', Sentry::getUser()->venue_id)
							->where('start_time', '>=', time());

			$event_type = 'Lead';
			$lead = true;
			break;

		case 2:
		default:
			$events_query = ClientEvent::where('confirmed', 1)
							->where('venue_id', Sentry::getUser()->venue_id)
							->where('start_time', '<', time());

			$event_type = 'Past Event';
			$lead = false;
			break;
	}


	if ($start_time != NULL && $end_time != NULL)
	{
		$events_query->where('start_time', '<=', $end_time)
					 ->where('start_time', '>=', $start_time);
	}
	 else if ($event_type == 'Past Event')
	{
		$events_query->where('start_time', '<', time());
	}
	  else
	{
		$events_query->where('start_time', '>=', time());
	}

	// Data supplied via params take preference, as it comes from the form
	if (Input::has('search'))
		$search = Input::get('search');

	if ($search != NULL && $search != 'none')
	{
		$events_query->where('title', 'LIKE', '%' . $search . '%'); // this search blows, improve it
	}

	// Sort can never be null, redundant check
	if ($sort != NULL || Input::has('sort'))
	{
		// This takes preference, as sort is given a default value
		if (Input::has('sort'))
			$sort = strtolower(Input::get('sort'));

		switch ($sort)
		{
			case 'room':
				$events_query->orderBy('room_id');
				break;

			case 'type':
				$events_query->orderBy('type');
				break;

			case 'price':
				$events_query->orderBy('total_price');
				break;

			case 'date':
				$events_query->orderBy('start_time', 'asc');
				break;
		}
	}

	$events = $events_query->get();

	if (count($events) > 0)
	{
		$title = $event_type . 's';
	}
	 else
	{
		$title = 'No ' . $event_type . 's Found';
	}


	$event_data = array();
	foreach ($events as $event)
	{
		$event_data[] = array(
							'id' => $event->id,
							'title' => $event->title,
							'date' => date('D, n/d/y', $event->start_time),
							'time' => date('g:i A', $event->start_time) . ' - ' . date('g:i A', $event->end_time),
							'room' => Room::find($event->room_id),
							'type' => $event->type,
							'guests_kids' => $event->guests_kids,
							'guests_adults' => $event->guests_adults,
							'confirmed' => ($event->confirmed == 1 ? '(confirmed)' : ''),
							'food_menu' => (isset($event->food_package) ? Menu::find($event->food_package) : NULL),
							'drink_menu' => (isset($event->drink_package) ? Menu::find($event->drink_package) : NULL),
							'price' => $event->total_price,
							'paid' => $event->balance_paid,
							'left' => $event->total_price - $event->balance_paid,
							'notes' => $event->notes
						);
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

	if ($search == 'none')
		$search = '';
	
	return View::make('admin.events')->with('event_data', $event_data)
									->with('rooms', $rooms)
									->with('food_options', $food_options)
									->with('drink_options', $drink_options)
									->with('addons', $addons)
									->with('lead', $lead)
									->with('title', $title)
									->with('venue', $venue)
									->with('search', $search)
									->with('sort', $sort)
									->with('deleted_event', $deleted_event);

});