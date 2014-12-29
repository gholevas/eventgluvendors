<?php

Route::any('edit_day', function()
{
	$validator = Validator::make(Input::all(),
		array(
			'day' => 'required|numeric',
			'from' => 'required',
			'to' => 'required',
			'duration' => 'required|numeric',
			'min_price' => 'required|numeric',
			'room' => 'required|numeric'
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

	// Turn to & from into seconds from start of day
	$from_parts = explode(':', Input::get('from'));
	$to_parts = explode(':', Input::get('to'));


	if (count($from_parts) != 2 || count($to_parts) != 2)
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => 'Time ranges are malformed.'
			),
			400
		);		
	}

	$from = $from_parts[0] * 60 * 60 + $from_parts[1] * 60;
	$to = $to_parts[0] * 60 * 60 + $to_parts[1] * 60;

	$pricing_day = PricingDay::where('venue_id', Sentry::getUser()->venue_id)
							 ->where('day', Input::get('day'))
							 ->first();


	$pricing_day = new PricingDay();
	$pricing_day->venue_id = Sentry::getUser()->venue_id;
	$pricing_day->day = Input::get('day');
	$pricing_day->from = $from;
	$pricing_day->to = $to;
	$pricing_day->min_price = Input::get('min_price');
	$pricing_day->room_id = Input::get('room');
	$pricing_day->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => ''
		),
		200
	);
});

Route::any('edit_date', function()
{
	$validator = Validator::make(Input::all(),
		array(
			'date' => 'required|numeric',
			'from' => 'required',
			'to' => 'required',
			'duration' => 'required|numeric',
			'min_price' => 'required|numeric',
			'room' => 'required|numeric'
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

	// Turn to & from into seconds from start of day
	$from_parts = explode(':', Input::get('from'));
	$to_parts = explode(':', Input::get('to'));

	if (count($from_parts) != 2 || count($to_parts) != 2)
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => 'Time ranges are malformed.'
			),
			400
		);		
	}

	$from = $from_parts[0] * 60 * 60 + $from_parts[1] * 60;
	$to = $to_parts[0] * 60 * 60 + $to_parts[1] * 60;

	$pricing_date = PricingDate::where('venue_id', Sentry::getUser()->venue_id)
							 ->where('day', Input::get('date'))
							 ->first();



	$pricing_date = new PricingDate();
	$pricing_date->venue_id = Sentry::getUser()->venue_id;
	$pricing_date->day = Input::get('date');
	$pricing_date->from = $from;
	$pricing_date->to = $to;
	$pricing_date->min_price = Input::get('min_price');
	$pricing_date->room_id = Input::get('room');
	$pricing_date->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => ''
		),
		200
	);
});



Route::any('get', function()
{
	$validator = Validator::make(Input::all(),
		array(
			'room_id' => 'required|numeric',
			'start_time' => 'required|numeric',
			'end_time' => 'required|numeric',
			'guests_adults' => 'required|numeric',
			'guests_kids' => 'required|numeric',
			'food_package' => 'required|numeric',
			'food_package_kids' => 'sometimes',
			'drink_package' => 'required|numeric',
			'drink_package_kids' => 'sometimes',
			'addons' => 'sometimes',
			'discount_percent' => 'required|numeric'
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

	$ret = PricingController::getPricing(Input::get('room_id'),
										Input::get('start_time'),
										Input::get('end_time'),
										Input::get('guests_adults'),
										Input::get('guests_kids'),
										Input::get('food_package'),
										Input::get('food_package_kids'),
										Input::get('drink_package'),
										Input::get('drink_package_kids'),
										Input::get('addons'),
										Input::get('discount_percent'));

	return Response::json(array(
		'error'    => 200,
		'message'  => json_encode($ret)
		),
		200
	);
});

Route::any('quote', function()
{
	$validator = Validator::make(Input::all(),
		array(
			'room' => 'required|numeric',
			'date' => 'required',
			'length' => 'required|numeric',
			'guests_adults' => 'required|numeric',
			'guests_kids' => 'required|numeric',
			'food_package' => 'required|numeric',
			'food_package_kids' => 'sometimes',
			'drink_package' => 'required|numeric',
			'drink_package_kids' => 'sometimes',
			'addons' => 'sometimes',
			'drink_package_extra' => 'sometimes',
			'drink_package_kids_extra' => 'sometimes',
			'food_package_extra' => 'sometimes',
			'food_package_kids_extra' => 'sometimes',
			'discount' => 'required|numeric'
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

	$date = str_replace('-', '', Input::get('date'));
	$start_time = strtotime($date);
	$end_time = $start_time + (Input::get('length') * 60*60);

	$drink_package_extra = array();
	$drink_package_kids_extra = array();
	$food_package_extra = array();
	$food_package_kids_extra = array();

	if (Input::has('food_package_extra'))
	{
		$food_package_extra = json_decode(Input::get('food_package_extra'));
	}

	if (Input::has('food_package_kids_extra'))
	{
		$food_package_kids_extra = json_decode(Input::get('food_package_kids_extra'));
	}
	
	if (Input::has('drink_package_extra'))
	{
		$drink_package_extra = json_decode(Input::get('drink_package_extra'));
	}

	if (Input::has('drink_package_kids_extra'))
	{
		$drink_package_kids_extra = json_decode(Input::get('drink_package_kids_extra'));
	}

	$pricing = PricingController::getPricing(Input::get('room'),
										$start_time,
										$end_time,
										Input::get('guests_adults'),
										Input::get('guests_kids'),
										Input::get('food_package'),
										Input::get('food_package_kids'),
										Input::get('drink_package'),
										Input::get('drink_package_kids'),
										json_decode(Input::get('addons')),
										Input::get('discount')/100,
										$food_package_extra,
										$food_package_kids_extra,
										$drink_package_extra,
										$drink_package_kids_extra);

	if ($pricing === false)
	{
		return Response::json(array(
			'error'    => 400,
			'message'  => 'The venue is not available during this timerange.'
			),
			400
		);		
	}

	$ret = array(
					'perperson' => $pricing['raw_price_pp'],
					'discount' => $pricing['discount_amount'],
					'grat' => $pricing['gratuity'],
					'tax' => $pricing['tax'],
					'total' => $pricing['final_price'],
				);

	return Response::json(array(
		'error'    => 200,
		'message'  => json_encode($ret)
		),
		200
	);
});

Route::get('get_extras', function()
{
	$validator = Validator::make(Input::all(),
		array(
			'menu_id' => 'required|numeric'
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

	$extras = MenuExtra::where('menu_id', Input::get('menu_id'))->get();
	$ret = array();
	foreach ($extras as $extra)
	{
		$ret[] = array('id' => $extra->id, 'name' => $extra->name, 'price' => $extra->price);
	}


	return Response::json(array(
		'error'    => 200,
		'message'  => json_encode($ret)
		),
		200
	);
});
