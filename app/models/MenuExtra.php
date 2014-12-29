<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class MenuExtra extends Eloquent {

	protected $table = 'menu_extras';
	
	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
