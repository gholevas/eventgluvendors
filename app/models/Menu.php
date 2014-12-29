<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Menu extends Eloquent {

	protected $table = 'menus';
	
	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
