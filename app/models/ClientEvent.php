<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ClientEvent extends Eloquent {

	protected $table = 'events';
	
	/*public static function boot()
	{
		parent::boot();

		Event::creating(function($event)
		{
			if (isset($event->venue_id))
			{
				// Check that the options, addons, extras, and rooms all match
			}
		});
	}*/

	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}