<?php

Route::any('add', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array('todo' => 'required|min:5')
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

	// Only todo field is marked as fillable
	$todo = new TodoItem(Input::all());
	$todo->venue_id = Sentry::getUser()->venue_id;
	$todo->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => $todo->id
		),
		200
	);
});

Route::any('delete', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array('todo_id' => 'required|numeric')
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
		$todo = TodoItem::find(Input::get('todo_id'));
	}
	 catch (Exception $e)
	{
		// Do this later
	}

	if ($todo->venue_id != Sentry::getUser()->venue_id)
	{
		$messages = $validator->messages();

		foreach ($messages->all() as $message)
		{
			return Response::json(array(
				'error'    => 403,
				'message'  => 'You cannot delete this item.'
				),
				403
			);
		}				
	}

	$todo->delete();

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
		array('todo_id' => 'required|numeric'),
		array('todo' => 'required|min:5')
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
		$todo = TodoItem::find(Input::get('todo_id'));
	}
	 catch (Exception $e)
	{
		// Do this later
	}

	if ($todo->venue_id != Sentry::getUser()->venue_id)
	{
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

	$todo->todo = Input::get('todo');
	$todo->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => ''
		),
		200
	);
});


Route::any('completed', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array('todo_id' => 'required|numeric')
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
	$todo = NULL;
	try
	{
		$todo = TodoItem::find(Input::get('todo_id'));
	}
	 catch (Exception $e)
	{
		// Do this later
	}

	if ($todo->venue_id != Sentry::getUser()->venue_id)
	{
		foreach ($messages->all() as $message)
		{
			return Response::json(array(
				'error'    => 403,
				'message'  => 'You cannot mark this item as completed.'
				),
				403
			);
		}				
	}

	$todo->completed_at = time();
	$todo->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => ''
		),
		200
	);
});