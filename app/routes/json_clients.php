<?php

Route::any('details', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array(
				'client_id' => 'required|numeric'
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

	$client = Client::find(Input::get('client_id'));

	if ($client == NULL)
	{
		// Handle this later
	}

	return Response::json(array(
		'error'    => 200,
		'message'  => json_encode($client)
		),
		200
	);
});

Route::any('add', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array(
				'first_name' => 'required|min:2',
				'last_name' => 'required|min:2',
				'phone_number' => 'required|min:7',
				'secondary_phone_number' => 'sometimes|min:7',
				'fax_number' => 'sometimes|min:7',
				'email' => 'required|min:5',
				'address' => 'required|min:5',
				'notes' => 'sometimes',
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

	$client = new Client(Input::all());
	$client->venue_id = Sentry::getUser()->venue_id;
	$client->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => $client->id
		),
		200
	);
});

Route::any('delete', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array('client_id' => 'required|numeric')
	);

	if ($validator->fails())
	{
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

	// Should also check that the todo ID is valid & belongs to this user
	try
	{
		$client = Client::find(Input::get('client_id'));
	}
	 catch (Exception $e)
	{
		// Do this later
	}

	if ($client->venue_id != Sentry::getUser()->venue_id)
	{
		foreach ($messages->all() as $message)
		{
			return Response::json(array(
				'error'    => 403,
				'message'  => 'You cannot delete this client.'
				),
				403
			);
		}				
	}

	$client->delete();

	return Response::json(array(
		'error'    => 200,
		'message'  => ''
		),
		200
	);
});

Route::any('edit', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array(	
				'client_id' => 'required|numeric',
				'first_name' => 'sometimes|min:2',
				'last_name' => 'sometimes|min:2',
				'phone_number' => 'sometimes|min:7',
				'secondary_phone_number' => 'sometimes|min:7',
				'fax_number' => 'sometimes|min:7',
				'email' => 'sometimes|min:5',
				'address' => 'sometimes|min:5',
				'notes' => 'sometimes',
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

	// Should also check that the todo ID is valid & belongs to this user
	try
	{
		$client = Client::find(Input::get('client_id'));
	}
	 catch (Exception $e)
	{
		// Do this later
	}

	if ($client->venue_id != Sentry::getUser()->venue_id)
	{
		$messages = $validator->messages();

		foreach ($messages->all() as $message)
		{
			return Response::json(array(
				'error'    => 403,
				'message'  => 'You cannot edit this item.'
				),
				403
			);
		}				
	}

	$client->fill(Input::all());
	$client->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => ''
		),
		200
	);
});

Route::any('search', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array('query' => 'required')
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

	// This search sucks, improve it in the future
	$clients = Client::where(DB::raw('concat(first_name, \' \', last_name)'), 'LIKE', '%'.Input::query('query').'%')->get();

	return Response::json(array(
		'error'    => 200,
		'message'  => json_encode($clients)
		),
		200
	);
});

Route::any('list', function()
{
	$clients = Client::where('venue_id', Sentry::getUser()->venue_id)->get();

	// We should be limiting/whitelisting the fields that are returned, do this later

	return Response::json(array(
		'error'    => 200,
		'message'  => json_encode($clients)
		),
		200
	);
});