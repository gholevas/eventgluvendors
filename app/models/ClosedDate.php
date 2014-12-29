<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ClosedDate extends Eloquent {

	protected $table = 'closed_date';
	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
