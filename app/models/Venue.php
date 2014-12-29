<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Venue extends Eloquent {

	protected $table = 'venues';


	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}