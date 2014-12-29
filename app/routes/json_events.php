<?php

Route::any('add', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$rules_event = array(
						'title' => 'required|min:3',
						'type' => 'required',
						'room' => 'required|numeric',
						'date' => 'required|min:4',
						'length' => 'required|numeric',
						'guests_adults' => 'required|numeric',
						'guests_kids' => 'required|numeric',
						'client_id' => 'required|numeric',
						'notes' => 'sometimes',
						'confirmed' => 'required|numeric',
						'full_quote' => 'required|numeric',
					);

	$rules_quote = array(
						'food_package' => 'required|numeric',
						'food_package_kids' => 'sometimes|numeric',
						'drink_package' => 'required|numeric',
						'drink_package_kids' => 'sometimes|numeric',
						'food_package_extra' => 'sometimes',
						'food_package_kids_extra' => 'sometimes',
						'drink_package_extra' => 'sometimes',
						'drink_package_kids_extra' => 'sometimes',
						'addons' => 'sometimes',
						'discount' => 'required|numeric',
					);

	$validator = Validator::make(Input::all(), $rules_event);

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

	if (Input::get('full_quote') == 1)
	{
		$validator = Validator::make(Input::all(), $rules_quote);

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
	}

	// Check type is valid - todo
	// check client exists - todo (make it a number)
	// For future, set:
		// dance_floor
		// buffet

	$error = NULL;

	$food_package_extras = array();
	$food_package_kids_extras = array();
	$drink_package_extras = array();
	$drink_package_kids_extras = array();

	// Ensure room, food, and drink options match this venue ID, if they're set
	$room = Room::find(Input::get('room'));
	if ($room->venue_id != Sentry::getUser()->venue_id)
	{
		$error = "You do not have access to this room.";
	}

	if (Input::get('full_quote') == 1)
	{
		$food_package = Menu::find(Input::get('food_package'));

		if ($food_package->venue_id != Sentry::getUser()->venue_id)
		{
			$error = 'You do not have access to this menu item';
		}

		$drink_package = Menu::find(Input::get('drink_package'));

		if ($drink_package->venue_id != Sentry::getUser()->venue_id)
		{
			$error = 'You do not have access to this menu item';
		}

		if (Input::has('food_package_kids'))
		{
			$food_package = Menu::find(Input::get('food_package_kids'));
			if ($food_package->venue_id != Sentry::getUser()->venue_id)
			{
				$error = 'You do not have access to this menu item';
			}			
		}

		if (Input::has('drink_package_kids'))
		{
			$drink_package = Menu::find(Input::get('drink_package_kids'));
			if ($drink_package->venue_id != Sentry::getUser()->venue_id)
			{
				$error = 'You do not have access to this menu item';
			}		
		}

		if (Input::has('food_package_extra'))
		{
			$extras = json_decode(Input::get('food_package_extra'));
			if (is_array($extras))
			{
				foreach ($extras as $extra_id)
				{
					$extra = MenuExtra::find($extra_id);
					$menu = Menu::find($extra->menu_id);
					if ($menu->venue_id != Sentry::getUser()->venue_id)
					{
						$error = 'You do not have access to this extra item.';
					}

					$food_package_extras[] = array('id' => $extra->id, 'name' => $extra->name, 'price' => $extra->price);
				}
			}
		}

		if (Input::has('food_package_kids_extra'))
		{
			$extras = json_decode(Input::get('food_package_kids_extra'));
			if (is_array($extras))
			{
				foreach ($extras as $extra_id)
				{
					$extra = MenuExtra::find($extra_id);
					$menu = Menu::find($extra->menu_id);
					if ($menu->venue_id != Sentry::getUser()->venue_id)
					{
						$error = 'You do not have access to this extra item.';
					}

					$food_package_kids_extras[] = array('id' => $extra->id, 'name' => $extra->name, 'price' => $extra->price);
				}
			}
		}

		if (Input::has('drink_package_extra'))
		{
			$extras = json_decode(Input::get('drink_package_extra'));
			if (is_array($extras))
			{
				foreach ($extras as $extra_id)
				{
					$extra = MenuExtra::find($extra_id);
					$menu = Menu::find($extra->menu_id);
					if ($menu->venue_id != Sentry::getUser()->venue_id)
					{
						$error = 'You do not have access to this extra item.';
					}

					$drink_package_extras[] = array('id' => $extra->id, 'name' => $extra->name, 'price' => $extra->price);
				}
			}
		}		

		if (Input::has('drink_package_kids_extra'))
		{
			$extras = json_decode(Input::get('drink_package_kids_extra'));

			if (is_array($extras))
			{
				foreach ($extras as $extra_id)
				{
					$extra = MenuExtra::find($extra_id);
					$menu = Menu::find($extra->menu_id);
					if ($menu->venue_id != Sentry::getUser()->venue_id)
					{
						$error = 'You do not have access to this extra item.';
					}

					$drink_package_kids_extras[] = array('id' => $extra->id, 'name' => $extra->name, 'price' => $extra->price);
				}
			}
		}
	}

	if ($error != NULL)
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => $error
			),
			400
		);		
	}
	// Ensure food extras, drink extras, and addons match this venue id if they're set
	//$addons = 

	// Get price_per_person, tax, gratuity, and subtract discount

	// Setup the event
	$event = new ClientEvent();
	$event->venue_id = Sentry::getUser()->venue_id;
	$event->client_id = Input::get('client_id');
	$event->title = Input::get('title');
	$event->date = str_replace('-', '', Input::get('date'));
	$event->room_id = Input::get('room');
	$event->length = Input::get('length');
	$event->guests_adults = Input::get('guests_adults');
	$event->guests_kids = Input::get('guests_kids');
	$event->notes = Input::get('notes');
	$event->type = Input::get('type');

	if (Input::has('addons'))
	{
		$addon_arr = array();
		$addons = json_decode(Input::get('addons'));
		$conv = function($a) { return (int)$a; };
		$addons = array_map($conv, $addons);
		$addon_arr = array();

		foreach ($addons as $addon)
		{
			$addon_obj = Addon::find($addon);
			$addon_arr[] = array('id' => $addon_obj->id, 'name' => $addon_obj->name, 'price' => $addon_obj->price);
		}

		if (count($addon_arr) > 0)
			$event->addons = serialize($addon_arr);
	}


	// Calculate start_time & end_time timestmaps
	$event->start_time = strtotime($event->date);
	$event->end_time = $event->start_time + (Input::get('length') * 60*60);

	// See if this room is available during this time range
	if (!PricingController::isAvailable($event->room_id, $event->start_time, $event->end_time))
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => 'This room is already booked during this time.'
			),
			400
		);			
	}

	if (Input::get('full_quote') == 1)
	{
		$event->food_option = Input::get('food_package');
		$event->drink_option = Input::get('drink_package');

		if (is_numeric(Input::get('food_package_kids')))
		{
			$event->food_option_kids = Input::get('food_package_kids');
		}

		if (is_numeric(Input::get('drink_package_kids')))
		{
			$event->drink_option_kids = Input::get('drink_package_kids');
		}

		$event->food_option_extras = serialize($food_package_extras);
		$event->drink_option_extras = serialize($drink_package_extras);
		$event->food_option_kids_extras = serialize($food_package_kids_extras);
		$event->drink_option_kids_extras = serialize($drink_package_kids_extras);

		$food_package_extras_ids = array();
		$drink_package_extras_ids = array();
		$food_package_kids_extras_ids = array();
		$drink_package_kids_extras_ids = array();

		foreach ($food_package_extras as $extra)
			$food_package_extras_ids[] = $extra['id'];

		foreach ($drink_package_extras as $extra)
			$drink_package_extras_ids[] = $extra['id'];

		foreach ($food_package_kids_extras as $extra)
			$food_package_kids_extras_ids[] = $extra['id'];

		foreach ($drink_package_kids_extras as $extra)
			$drink_package_kids_extras_ids[] = $extra['id'];

		$pricing = PricingController::getPricing(Input::get('room'),
											$event->start_time,
											$event->end_time,
											Input::get('guests_adults'),
											Input::get('guests_kids'),
											Input::get('food_package'),
											Input::get('food_package_kids'),
											Input::get('drink_package'),
											Input::get('drink_package_kids'),
											json_decode(Input::get('addons')), // this is just an array of addon IDs, which is what this method expects
											Input::get('discount')/100,
											$food_package_extras_ids,
											$food_package_kids_extras_ids,
											$drink_package_extras_ids,
											$drink_package_kids_extras_ids);

		if ($pricing === false)
		{
			return Response::json(array(
				'error'    => 400,
				'message'  => 'The venue is not open during this time range.'
				),
				400
			);					
		}

		$event->deposit = 0;
		$event->total_price = $pricing['final_price'];
		$event->price_per_person = $pricing['raw_price_pp'];
		$event->tax = $pricing['tax'];
		$event->gratuity = $pricing['gratuity'];
		$event->balance_paid = 0;
		$event->discount = $pricing['discount_amount'];
		$event->discount_percent = Input::get('discount')/100; // need to divide whatever we're sent by 100
	}
	 else
	{
		// Still check if the room is available if it's just an event
		$room_id = $event->room_id;
		$start_time = $event->start_time;
		$end_time = $event->end_time;
		$to = $end_time % (60*60*24);
		$date_start = strtotime(date('m/d/Y 00:00:00', $start_time));
		$date_end = strtotime(date('m/d/Y 00:00:00', $end_time));
		$day = date('w', $start_time);

		$min_price = PricingController::findMinPrice($room_id, $date_start, $date_end, $day, $to);

		if ($min_price == NULL)
		{
			return Response::json(array(
				'error'    => 400,
				'message'  => 'The venue is not open during this time range.'
				),
				400
			);					
		}
	}

	$event->due_by = time() + (60*60*24*30); // 1 month

	// FOOD EXTRAS
	// DRINK EXTRAS

	$event->confirmed = (Input::get('confirmed') == 0 ? 0 : 1);
	$event->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => $event->id
		),
		200
	);
});

Route::any('list', function()
{
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
		if (count($event_row) >= 3)
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
			foreach ($event_row as $event)
			{
				$event_result[] = $event;
			}
		}
	}

		return Response::json(array(
		'error'    => 200,
		'message'  => json_encode($event_result)
		),
		200
	);
});

Route::any('logpayment', function()
{
	$validator = Validator::make(Input::all(),
		array('event_id' => 'required|numeric'),
		array('amount' => 'required|numeric')
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

	if (Input::get('amount') <= 0)
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => 'The amount must be positive and above zero.'
			),
			400
		);		
	}

	$event = ClientEvent::find(Input::get('event_id'));
	if ($event->venue_id != Sentry::getUser()->venue_id)
	{
		return Response::json(array(
			'error'    => 403,
			'message'  => 'You cannot edit this event.'
			),
			403
		);		
	}
	// this should obviously use transactions... todo
	$event->balance_paid += Input::get('amount');

	if ($event->total_price < $event->balance_paid)
		$event->balance_paid = $event->total_price;

	$event->save();



	return Response::json(array(
		'error'    => 200,
		'message'  => json_encode(array('balance_paid' => $event->balance_paid, 'remaining_balance' => $event->total_price - $event->balance_paid))
		),
		200
	);
});

Route::any('edit_summary', function()
{
	$rules_event = array(
						'event_id' => 'required|numeric',
						'type' => 'required',
						'room' => 'required|numeric',
						'date' => 'required|min:4',
						'length' => 'required|numeric',
						'guests_adults' => 'required|numeric',
						'guests_kids' => 'required|numeric',
					);

	$validator = Validator::make(Input::all(), $rules_event);

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

	$room = Room::find(Input::get('room'));
	if ($room->venue_id != Sentry::getUser()->venue_id)
	{
		$error = "You do not have access to this room.";
	}

	$event = ClientEvent::find(Input::get('event_id'));
	if ($event->venue_id != Sentry::getUser()->venue_id)
	{
		$error = "You do not have access to this event.";
	}

	$new_room_id =Input::get('room');
	$new_date = str_replace('-', '', Input::get('date'));
	$new_start_time = strtotime($new_date);
	$new_end_time = $event->start_time + (Input::get('length') * 60*60);

	// Check if rooms/times have changed, then recheck availability
	// note: we don't check date since its format can be ui-dependent, instead check the timestamps
	if ($new_room_id != $event->room_id || $new_start_time != $event->start_time || $new_end_time != $event->end_time)
	{
		if (!PricingController::isAvailable($new_room_id, $new_start_time, $new_end_time, $event->id))
		{
			return Response::json(array(
				'error'    => 400,
				'message'  => 'This room is already booked during this time.'
				),
				400
			);			
		}		
	}

	$event->guests_adults = Input::get('guests_adults');
	$event->guests_kids = Input::get('guests_kids');
	$event->room_id = $new_room_id;
	$event->type = Input::get('type');
	$event->length = Input::get('length');
	$event->date = $new_date;
	$event->start_time = $new_start_time;
	$event->end_time = $new_end_time;

	// A different number of guests and different room can change the price
	$addons = array();
	$event_addons = unserialize($event->addons);
	if (is_array($event_addons))
	{
		foreach ($event_addons as $addon)
		{
			$addons[] = $addon['id'];
		}
	}

	// Still pass the extras info to the getPricing method
	$food_package_extras = unserialize($event->food_option_extras);
	$drink_package_extras = unserialize($event->drink_option_extras);
	$food_package_kids_extras = unserialize($event->food_option_kids_extras);
	$drink_package_kids_extras = unserialize($event->drink_option_kids_extras);

	$food_package_extras_ids = array();
	$drink_package_extras_ids = array();
	$food_package_kids_extras_ids = array();
	$drink_package_kids_extras_ids = array();

	foreach ($food_package_extras as $extra)
		$food_package_extras_ids[] = $extra['id'];

	foreach ($drink_package_extras as $extra)
		$drink_package_extras_ids[] = $extra['id'];

	foreach ($food_package_kids_extras as $extra)
		$food_package_kids_extras_ids[] = $extra['id'];

	foreach ($drink_package_kids_extras as $extra)
		$drink_package_kids_extras_ids[] = $extra['id'];


	$pricing = PricingController::getPricing($event->room_id,
										$event->start_time,
										$event->end_time,
										$event->guests_adults,
										$event->guests_kids,
										$event->food_option,
										$event->food_option_kids,
										$event->drink_option,
										$event->drink_option_kids,
										$addons,
										$event->discount_percent,
										$food_package_extras_ids,
										$food_package_kids_extras_ids,
										$drink_package_extras_ids,
										$drink_package_kids_extras_ids);

	if ($pricing === false)
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => 'The venue is not open during this time range anymore.'
			),
			400
		);					
	}

	$event->total_price = $pricing['final_price'];
	$event->price_per_person = $pricing['raw_price_pp'];
	$event->tax = $pricing['tax'];
	$event->gratuity = $pricing['gratuity'];
	$event->discount = $pricing['discount_amount'];

	$event->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => ''
		),
		200
	);
});

// Just editing the order
Route::any('edit', function()
{
	$rules_event = array(
						'event_id' => 'required|numeric',
						'food_package' => 'required|numeric',
						'food_package_kids' => 'sometimes|numeric',
						'drink_package' => 'required|numeric',
						'drink_package_kids' => 'sometimes|numeric',
						'addons' => 'sometimes',
						'discount' => 'required|numeric',
						'notes' => 'sometimes'
					);

	$validator = Validator::make(Input::all(), $rules_event);

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

	$event = ClientEvent::find(Input::get('event_id'));
	if ($event->venue_id != Sentry::getUser()->venue_id)
	{
		$error = "You do not have access to this event.";
	}

	// *******************
	// TODO - validation that the food options, drink options, and extras are for this venue

	$event->food_option = Input::get('food_package');
	$event->drink_option = Input::get('drink_package');

	// Don't check if drink package kids is set below, as if it's not
	// then it may mean that they want to remove the prior kids packages
	$event->drink_option_kids = Input::get('drink_package_kids');
	$event->food_option_kids = Input::get('food_package_kids');

	// Get the extras input
	$drink_package_extras_inp = json_decode(Input::get('drink_package_extra'));
	$food_package_extras_inp = json_decode(Input::get('food_package_extra'));
	$drink_package_kids_extras_inp = json_decode(Input::get('drink_package_kids_extra'));
	$food_package_kids_extras_inp = json_decode(Input::get('food_package_kids_extra'));

	// Parse it into arrays for the DB
	$drink_package_extras = array();
	$food_package_extras = array();
	$drink_package_kids_extras = array();
	$food_package_kids_extras = array();

	if (is_array($drink_package_extras_inp))
	{
		foreach ($drink_package_extras_inp as $extra_id)
		{
			$extra = MenuExtra::find($extra_id);
			$drink_package_extras[] = array('id' => $extra->id, 'name' => $extra->name, 'price' => $extra->price);
		}
	}

	if (is_array($food_package_extras_inp))
	{	
		foreach ($food_package_extras_inp as $extra_id)
		{
			$extra = MenuExtra::find($extra_id);
			$food_package_extras[] = array('id' => $extra->id, 'name' => $extra->name, 'price' => $extra->price);
		}
	}

	if (is_array($drink_package_kids_extras_inp))
	{
		foreach ($drink_package_kids_extras_inp as $extra_id)
		{
			$extra = MenuExtra::find($extra_id);
			$drink_package_kids_extras[] = array('id' => $extra->id, 'name' => $extra->name, 'price' => $extra->price);
		}
	}	

	if (is_array($food_package_kids_extras_inp))
	{
		foreach ($food_package_kids_extras_inp as $extra_id)
		{
			$extra = MenuExtra::find($extra_id);
			$food_package_kids_extras[] = array('id' => $extra->id, 'name' => $extra->name, 'price' => $extra->price);
		}
	}	

	// Set them in the event row
	$event->food_option_extras = serialize($food_package_extras);
	$event->drink_option_extras = serialize($drink_package_extras);
	$event->food_option_kids_extras = serialize($food_package_kids_extras);
	$event->drink_option_kids_extras = serialize($drink_package_kids_extras);

	// If we don't do this, MySQL throws foreign key errors
	if ($event->drink_option_kids == '')
		$event->drink_option_kids = NULL;
	if ($event->food_option_kids == '')
		$event->food_option_kids = NULL;

	$addons_sent = false;
	if (Input::has('addons'))
	{
		$addon_arr = array();
		$addons = json_decode(Input::get('addons'));

		$conv = function($a) { return (int)$a; };
		$addons = array_map($conv, $addons);

		foreach ($addons as $addon)
		{
			$addon_obj = Addon::find($addon);
			$addon_arr[] = array('id' => $addon_obj->id, 'name' => $addon_obj->name, 'price' => $addon_obj->price);
		}

		if (count($addon_arr) > 0)
		{
			$event->addons = serialize($addon_arr);
			$addons_sent = true;
		}
	}
	
	if (!$addons_sent)
	{
		$event->addons = serialize(array()); // no addons here means that any that did exist were unset
	}

	$event->notes = Input::get('notes');
	$event->discount = Input::get('discount')/100;

	$addons = array();
	$event_addons = unserialize($event->addons);

	if (is_array($event_addons))
	{
		foreach ($event_addons as $addon)
		{
			$addons[] = $addon['id'];
		}
	}

	// These can all just be set to event->
	$pricing = PricingController::getPricing($event->room_id,
										$event->start_time,
										$event->end_time,
										$event->guests_adults,
										$event->guests_kids,
										$event->food_option,
										$event->food_option_kids,
										$event->drink_option,
										$event->drink_option_kids,
										$addons,
										$event->discount_percent,
										$food_package_extras_inp,
										$food_package_kids_extras_inp,
										$drink_package_extras_inp,
										$drink_package_kids_extras_inp);

	if ($pricing === false)
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => 'The venue is not open during this time range anymore.'
			),
			400
		);					
	}

	$event->total_price = $pricing['final_price'];
	$event->price_per_person = $pricing['raw_price_pp'];
	$event->tax = $pricing['tax'];
	$event->gratuity = $pricing['gratuity'];
	$event->discount = $pricing['discount_amount'];
	$event->discount_percent = Input::get('discount')/100; // need to divide whatever we're sent by 100

	$event->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => ''
		),
		200
	);
});