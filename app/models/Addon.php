<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Addon extends Eloquent {

	protected $table = 'addons';
	
	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
