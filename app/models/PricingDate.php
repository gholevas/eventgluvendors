<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PricingDate extends Eloquent {

	protected $table = 'pricing_date';

	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
