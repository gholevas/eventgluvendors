<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class GalleryItem {

	protected $table = 'gallery';
	
	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
