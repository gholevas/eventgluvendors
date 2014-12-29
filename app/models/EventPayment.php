<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class EventPayment {

	protected $table = 'event_payments';
	
	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
