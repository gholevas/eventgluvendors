<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Room extends Eloquent {

	protected $table = 'rooms';
	
	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
