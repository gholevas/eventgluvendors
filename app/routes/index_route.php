<?php

// Going to need to clean up the routes and remove the default template code, and then redundancies like this
Route::get('/index', function()
{
	$todos = TodoItem::where('venue_id', Sentry::getUser()->venue_id)->where('completed_at', 0)->get();
	$rooms = Room::where('venue_id', Sentry::getUser()->venue_id)->get();
	$food_options = Menu::where('venue_id', Sentry::getUser()->venue_id)
							->where('type', 0)
							->get();
	$drink_options = Menu::where('venue_id', Sentry::getUser()->venue_id)
							->where('type', 1)
							->get();
	$addons = Addon::where('venue_id', Sentry::getUser()->venue_id)->get();

	$venue = Venue::find(Sentry::getUser()->venue_id);

	// Upcoming events
	$upcoming_events = count(ClientEvent::where('venue_id', Sentry::getUser()->venue_id)
								  ->where('start_time', '>=', time())
								  ->where('confirmed', 1)
								  ->get());

	// Events last week
	$last_week = strtotime('-1 week +1 day');
	$last_week_start = strtotime('last saturday midnight', $last_week);
	$last_week_end = strtotime('next saturday midnight', $last_week);
	$events_last_week = count(ClientEvent::where('venue_id', Sentry::getUser()->venue_id)
								  ->where('start_time', '>=', $last_week_start)
								  ->where('start_time', '<', $last_week_end)
								  ->where('confirmed', 1)
								  ->get());
	

	// Events last month
	$events_last_month = count(ClientEvent::where('venue_id', Sentry::getUser()->venue_id)
								  ->where('start_time', '>=', strtotime(date('m/d/Y 00:00:00', strtotime('first day of last month'))))
								  ->where('start_time', '<=', strtotime(date('m/d/Y 23:59:59', strtotime('last day of last month'))))
								  ->where('confirmed', 1)
								  ->get());
	// Upcoming leads
	$upcoming_leads = count(ClientEvent::where('venue_id', Sentry::getUser()->venue_id)
								  ->where('start_time', '>=', time())
								  ->where('confirmed', 0)
								  ->get());
	// Leads last week
	$leads_last_week = count(ClientEvent::where('venue_id', Sentry::getUser()->venue_id)
								  ->where('start_time', '>=', $last_week_start)
								  ->where('start_time', '<=', $last_week_end)
								  ->where('confirmed', 0)
								  ->get());
	
	// Leads last month
	$leads_last_month = count(ClientEvent::where('venue_id', Sentry::getUser()->venue_id)
								  ->where('start_time', '>=', strtotime(date('m/d/Y 00:00:00', strtotime('first day of last month'))))
								  ->where('start_time', '<=', strtotime(date('m/d/Y 23:59:59', strtotime('last day of last month'))))
								  ->where('confirmed', 0)
								  ->get());
	// Past events
	$past_events = count(ClientEvent::where('venue_id', Sentry::getUser()->venue_id)
								  ->where('start_time', '<', time())
								  ->where('confirmed', 1)
								  ->get());

	// events last week (redundant)
	// events last month (redundant)

	return View::make('admin.index')->with('todos', $todos)
									->with('rooms', $rooms)
									->with('food_options', $food_options)
									->with('drink_options', $drink_options)
									->with('addons', $addons)
									->with('venue', $venue)
									->with('upcoming_events', $upcoming_events)
									->with('events_last_week', $events_last_week)
									->with('events_last_month', $events_last_month)
									->with('upcoming_leads', $upcoming_leads)
									->with('leads_last_week', $leads_last_week)
									->with('leads_last_month', $leads_last_month)
									->with('past_events', $past_events);
});