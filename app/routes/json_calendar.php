<?php

Route::any('save', function()
{
	$days = array('sunday' => 0, 'monday' => 1, 'tuesday' => 2, 'wednesday' => 3, 'thursday' => 4, 'friday' => 5, 'saturday' => 6);

	// Perform initial validation for fields that are needed 
	$validator = Validator::make(Input::all(),
		array(
			'room_id' => 'required|numeric',
			'open' => 'required|numeric',		
			'date_start' => 'required',
			'date_end' => 'required'
		)
	);

	if ($validator->fails())
	{
		$messages = $validator->messages();

		// Return the first error
		foreach ($messages->all() as $message)
		{
			return Response::json(array(
				'error'    => 400,
				'message'  => $message
				),
				400
			);
		}
	}	


	$room_id = Input::get('room_id');
	$date_start = Input::get('date_start');
	$date_end = Input::get('date_end');
	$date_start_ts = strtotime(date('m/d/Y 00:00:00', strtotime($date_start)));
	$room = Room::find($room_id);
	$deleted_rows = 0;

	if ($room->venue_id != Sentry::getUser()->venue_id)
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => 'You cannot edit pricing for this room.'
			),
			400
		);
	}

	// Handle case of store being closed
	if (Input::get('open') == 0)
	{
		if (Input::get('type') == 'day')
		{
			$day = $days[$date_start];

			PricingDay::where('venue_id', Sentry::getUser()->venue_id)
				   ->where('room_id', $room_id)
				   ->where('day', $day)
				   ->delete();

			ClosedDay::where('venue_id', Sentry::getUser()->venue_id)
				   ->where('room_id', $room_id)
				   ->where('day', $day)
				   ->delete();

			$open = new ClosedDay();
			$open->venue_id = Sentry::getUser()->venue_id;
			$open->room_id = $room_id;
			$open->day = $day;
			$open->save();
		}	
		 else
		{
			PricingDate::where('venue_id', Sentry::getUser()->venue_id)
				   ->where('room_id', $room_id)
				   ->where('date', '=', $date_start_ts)
				   ->delete();

			ClosedDate::where('venue_id', Sentry::getUser()->venue_id)
				   ->where('room_id', $room_id)
				   ->where('date', '=', $date_start_ts)
				   ->delete();

			$open = new ClosedDate();
			$open->venue_id = Sentry::getUser()->venue_id;
			$open->room_id = $room_id;
			$open->date = $date_start_ts;
			$open->save();
		}

		return Response::json(array(
			'error'    => 200,
			'message'  => ''
			),
			200
		);	
	}
	 else
	{
		// If the room was being marked as closed (above), then we're done
		// Here, if it's being marked as open, we need to make sure that there are no ClosedDay/Date rows
		// This is only for dates - for days, we need to have timeranges & prices set
		if (Input::get('type') == 'adv')
		{
			$deleted_rows = ClosedDate::where('venue_id', Sentry::getUser()->venue_id)
				   ->where('room_id', $room_id)
				   ->where('date', '=', $date_start_ts)
				   ->delete();
		}		
	}



	// Perform validation for fields needed if venue not set to closed
	$validator = Validator::make(Input::all(),
		array(
			'from' => 'required|numeric',
			'to' => 'required|numeric',	
			'min_hours' => 'required|numeric',
			'min_spend' => 'required|numeric',
			'advanced' => 'sometimes',
			'type' => 'required'
		)
	);

	if ($validator->fails())
	{
		$messages = $validator->messages();

		// Return the first error
		foreach ($messages->all() as $message)
		{
			// If we haven't marked hte day as open, then it was already open
			// So they haven't resubmitted anything... so error
			if ($deleted_rows == 0)
			{
				return Response::json(array(
					'error'    => 400,
					'message'  => $message
					),
					400
				);
			}
			 else
			{
				return Response::json(array(
					'error'    => 200,
					'message'  => 'opened'
					),
					200
				);				
			}
		}
	}		

	$room_id = Input::get('room_id');
	$from = Input::get('from');
	$to = Input::get('to');
	$min_hours = Input::get('min_hours');
	$min_spend = Input::get('min_spend');
	$date_start = Input::get('date_start');
	$date_end = Input::get('date_end');
	$advanced = (Input::has('advanced') ? json_decode(Input::get('advanced')) : array());
	$type = Input::get('type');

	$room = Room::find($room_id);
	if ($room->venue_id != Sentry::getUser()->venue_id)
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => 'You cannot edit pricing for this room.'
			),
			400
		);
	}

	// Get a more reliable way to check if it's for a day/date
	if ($type == 'day')
	{
		// It's for a day
		$day = $days[$date_start];

		// Delete the old ones
		PricingDay::where('venue_id', Sentry::getUser()->venue_id)
				   ->where('room_id', $room_id)
				   ->where('day', $day)
				   ->delete();

		ClosedDay::where('venue_id', Sentry::getUser()->venue_id)
			   ->where('room_id', $room_id)
			   ->where('day', $day)
			   ->delete();

		// First handle the main one
		$from_s = (int)($from / 100) * 60 * 60 + ($from % 100) * 60;
		$to_s = (int)($to / 100) * 60 * 60 + ($to % 100) * 60;

		$pricing = new PricingDay();
		$pricing->venue_id = Sentry::getUser()->venue_id;
		$pricing->day = $day;
		$pricing->from = $from_s;
		$pricing->to = $to_s;
		$pricing->min_price = $min_spend;
		$pricing->room_id = $room_id;
		$pricing->duration = $min_hours;
		$pricing->save();

		// Next handle the advanced ones		
		foreach ($advanced as $option)
		{
			$min_spend = $option[0];
			$from = $option[1];
			$to = $option[2];
			$from_s = (int)($from / 100) * 60 * 60 + ($from % 100) * 60;
			$to_s = (int)($to / 100) * 60 * 60 + ($to % 100) * 60;

			$pricing = new PricingDay();
			$pricing->venue_id = Sentry::getUser()->venue_id;
			$pricing->day = $day;
			$pricing->from = $from_s;
			$pricing->to = $to_s;
			$pricing->min_price = $min_spend;
			$pricing->room_id = $room_id;
			$pricing->duration = $min_hours;
			$pricing->save();
		}
	}
	 else
	{
		// It's for a date
		$date_start_ts = strtotime(date('m/d/Y 00:00:00', strtotime($date_start)));

		// Delete the old ones
		PricingDate::where('venue_id', Sentry::getUser()->venue_id)
				   ->where('room_id', $room_id)
				   ->where('date', '=', $date_start_ts)
				   ->delete();

		ClosedDate::where('venue_id', Sentry::getUser()->venue_id)
			   ->where('room_id', $room_id)
			   ->where('date', '=', $date_start_ts)
			   ->delete();


		// First handle the main one
		$from_s = (int)($from / 100) * 60 * 60 + ($from % 100) * 60;
		$to_s = (int)($to / 100) * 60 * 60 + ($to % 100) * 60;

		$pricing = new PricingDate();
		$pricing->venue_id = Sentry::getUser()->venue_id;
		$pricing->date = $date_start_ts;
		$pricing->from = $from_s;
		$pricing->to = $to_s;
		$pricing->min_price = $min_spend;
		$pricing->room_id = $room_id;
		$pricing->duration = $min_hours;
		$pricing->save();

		// Next handle the advanced ones		
		foreach ($advanced as $option)
		{
			$min_spend = $option[0];
			$from = $option[1];
			$to = $option[2];
			$from_s = (int)($from / 100) * 60 * 60 + ($from % 100) * 60;
			$to_s = (int)($to / 100) * 60 * 60 + ($to % 100) * 60;

			$pricing = new PricingDate();
			$pricing->venue_id = Sentry::getUser()->venue_id;
			$pricing->date = $date_start_ts;
			$pricing->from = $from_s;
			$pricing->to = $to_s;
			$pricing->min_price = $min_spend;
			$pricing->room_id = $room_id;
			$pricing->duration = $min_hours;
			$pricing->save();
		}
	}

	return Response::json(array(
		'error'    => 200,
		'message'  => ''
		),
		200
	);
});

Route::any('list', function()
{
	$validator = Validator::make(Input::all(),
		array(
			'room_id' => 'required|numeric'
		)
	);

	if ($validator->fails())
	{
		$messages = $validator->messages();

		// Return the first error
		foreach ($messages->all() as $message)
		{
			return Response::json(array(
				'error'    => 400,
				'message'  => $message
				),
				400
			);
		}
	}	


	$room_id = Input::get('room_id');

	$events = ClientEvent::where('venue_id', Sentry::getUser()->venue_id)
					->where('confirmed', 1)
					->where('start_time', '>=', time())
					->get();

	$events_by_date = array();

	$event_result = array();

	foreach ($events as $event)
	{
		$events_by_date[date('m/d/Y', $event->start_time)][] =  array(
								 'title' => $event->title,
								 'start' => date('Y-m-d H:i:s', $event->start_time),
								 'end' => date('Y-m-d H:i:s', $event->start_time), // we don't want them to span two boxes, so set the end time to the start time
								 'event_id' => $event->id,
								 'start_time' => 0,
								 'end_time' => 0
						);
	}

	foreach ($events_by_date as $date => $event_row)
	{
		// Grouping shouldn't be needed here as the calendar is large and per-room
		/*if (count($event_row) >= 3)
		{
			$event_result[] = array(
								 'title' => count($event_row) . ' events',
								 'start' => date('Y-m-d H:i:s', strtotime($date)),
								 'end' => date('Y-m-d H:i:s', strtotime($date)),
								 'event_id' => 0,
								 'start_time' => strtotime(date('m/d/Y 00:00:00', strtotime($date))),
								 'end_time' => strtotime(date('m/d/Y 23:59:59', strtotime($date)))
						);
		}
		 else
		{
		*/
			foreach ($event_row as $event)
			{
				$event_result[] = $event;
			}
		/*
		}
		*/
	}

	// probably shouldn't be getting them ALL, but we can change that later
	$date_rows = PricingDate::where('venue_id', Sentry::getUser()->venue_id)->get();

	$dates = array();
	foreach ($date_rows as $date_row)
	{
		$start_time = date('Y-m-d H:i:s', $date_row->date + $date_row->from);
		$end_time = date('Y-m-d H:i:s', $date_row->date + $date_row->to);
		$dates[$date_row->date][] = array(
											'start_time' => $start_time,
											'end_time' => $end_time,
											'duration' => $date_row->duration,
											'min_price' => $date_row->min_price,
										);
	}

	$closed_rows = ClosedDate::where('venue_id', Sentry::getUser()->venue_id)
			   ->where('room_id', $room_id)
			   ->get();
	foreach ($closed_rows as $row)
	{
		if (isset($dates[$row->date]) && is_array($dates[$row->date]))
		{
			$dates[$row->date]['open'] = false;
		}
		 else
		{
			$start_time = date('Y-m-d H:i:s', $row->date);

			$dates[$row->date][] = array(
											'start_time' => $start_time,
											'end_time' => 0,
											'duration' => 0,
											'min_price' => 0,
											'open' => false
										);
		}	
	}

	// Sort them in order of decreasing range
	$sorter = function($a, $b){
		$time_a = strtotime($a['end_time']) - strtotime($a['start_time']);
		$time_b = strtotime($b['end_time']) - strtotime($b['start_time']);

		if ($time_a == $time_b)
			return 0;

		return ($time_a < $time_b) ? 1 : -1;
	};

	$timeslots = array();
	foreach ($dates as $date)
	{
		usort($date, $sorter); // $date passed by reference

		$i = 0;
		foreach ($date as $rule)
		{
			// This is the main rule
			if ($i == 0)
			{
				$timeslots[date('Y-m-d', strtotime($rule['start_time']))][] = array(
																						'business_start' => $rule['start_time'],
																						'business_end' => $rule['end_time'],
																						'minimum_hours' => $rule['duration'],
																						'minimum_spend' => $rule['min_price'],
																						'open' => (isset($rule['open']) ? (int)$rule['open'] : 1)
																					);
			}
			 else
			{
				$timeslots[date('Y-m-d', strtotime($rule['start_time']))][] = array(
																						'rule_start' => $rule['start_time'],
																						'rule_end' => $rule['end_time'],
																						'minimum_spend' => $rule['min_price'],
																						'open' => (isset($rule['open']) ? (int)$rule['open'] : 1)
																					);
			}
			

			$i++;
		}
	}

	// probably shouldn't be getting them ALL, but we can change that later
	$date_rows = PricingDay::where('venue_id', Sentry::getUser()->venue_id)->get();

	$days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');

	$dates = array();
	foreach ($date_rows as $date_row)
	{
		$start_time = date('H:i:s', $date_row->from);
		$end_time = date('H:i:s', $date_row->to);
		$dates[$days[$date_row->day]][] = array(
											'start_time' => $start_time,
											'end_time' => $end_time,
											'min_price' => $date_row->min_price,
											'duration' => $date_row->duration
										);
	}

	$closed_rows = ClosedDay::where('venue_id', Sentry::getUser()->venue_id)
			   ->where('room_id', $room_id)
			   ->get();

	foreach ($closed_rows as $row)
	{
		if (isset($dates[$row->day]) && is_array($dates[$row->day]))
		{
			$dates[$days[$row->day]]['open'] = false;
		}
		 else
		{
			$dates[$days[$row->day]][] = array(
											'start_time' => 0,
											'end_time' => 0,
											'duration' => 0,
											'min_price' => 0,
											'open' => false
										);
		}			
	}


	// Sort them in order of decreasing range
	$sorter = function($a, $b){
		$time_a = strtotime($a['end_time']) - strtotime($a['start_time']);
		$time_b = strtotime($b['end_time']) - strtotime($b['start_time']);

		if ($time_a == $time_b)
			return 0;

		return ($time_a < $time_b) ? 1 : -1;
	};

	$dayslots = array();
	foreach ($dates as $day => $date)
	{
		usort($date, $sorter); // $date passed by reference

		$i = 0;
		foreach ($date as $rule)
		{
			// This is the main rule
			if ($i == 0)
			{
				$dayslots[$day][] = array(
											'business_start' => $rule['start_time'],
											'business_end' => $rule['end_time'],
											'minimum_hours' => $rule['duration'],
											'minimum_spend' => $rule['min_price'],
											'open' => (isset($rule['open']) ? (int)$rule['open'] : 1)
										);
			}
			 else
			{
				$dayslots[$day][] = array(
											'rule_start' => $rule['start_time'],
											'rule_end' => $rule['end_time'],
											'minimum_spend' => $rule['min_price'],
											'open' => (isset($rule['open']) ? (int)$rule['open'] : 1)
										);
			}
			

			$i++;
		}
	}

	return Response::json(array(
		'error'    => 200,
		'message'  => json_encode(array('calendar' => $event_result, 'timeslot' => $timeslots, 'dayslot' => $dayslots))
		),
		200
	);
});