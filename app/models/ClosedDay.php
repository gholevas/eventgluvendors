<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ClosedDay extends Eloquent {

	protected $table = 'closed_day';

	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
