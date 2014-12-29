<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class TodoItem extends Eloquent {

	protected $table = 'todo_lists';
	
	protected $fillable = array('todo');

	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];


}
