<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class EventNote extends Eloquent {

	protected $table = 'event_notes';
	protected $fillable = array('note');

	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
