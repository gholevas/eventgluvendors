<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PricingDay extends Eloquent {

	protected $table = 'pricing_day';

	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
