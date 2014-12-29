<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Client extends Eloquent {

	protected $table = 'clients';

	protected $fillable = array(
									'first_name',
									'last_name',
									'phone_number',
									'secondary_phone_number',
									'fax_number',
									'email',
									'address',
									'notes'
								);

	/**
	* To allow soft deletes
	*/
	use SoftDeletingTrait;
    protected $dates = ['deleted_at'];

}
