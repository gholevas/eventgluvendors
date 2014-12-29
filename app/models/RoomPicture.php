<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class RoomPicture {

	protected $table = 'room_pictures';
	
	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
