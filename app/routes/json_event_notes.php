<?php

Route::any('add', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array(
			'event_id' => 'required|numeric',
			'note' => 'required|min:2',
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

	// Only todo field is marked as fillable
	$note = new EventNote(Input::all());
	$note->event_id = Input::get('event_id');
	$note->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => json_encode(array('id' => $note->id, 'item' => Input::get('note')))
		),
		200
	);
});

Route::any('delete', function()
{
	// Validation rules should be refactored to the models... but that's for later
	$validator = Validator::make(Input::all(),
		array('note_id' => 'required|numeric')
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
		$note = EventNote::find(Input::get('note_id'));
	}
	 catch (Exception $e)
	{
		// Do this later
	}

	$event = ClientEvent::find($note->event_id);
	if ($event->venue_id != Sentry::getUser()->venue_id)
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

	$note->delete();

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
		array('note_id' => 'required|numeric'),
		array('note' => 'required|min:5')
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
		$note = EventNote::find(Input::get('note_id'));
	}
	 catch (Exception $e)
	{
		return Response::json(array(
			'error'    => 403,
			'message'  => 'Note not found.'
			),
			403
		);	
	}

	$event = ClientEvent::find($note->event_id);
	if ($event->venue_id != Sentry::getUser()->venue_id)
	{
		return Response::json(array(
			'error'    => 403,
			'message'  => 'You cannot edit this item.'
			),
			403
		);			
	}

	$note->note = Input::get('note');
	$note->save();

	return Response::json(array(
		'error'    => 200,
		'message'  => $note->note
		),
		200
	);
});
