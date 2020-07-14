<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{

	protected $fillable = array('user_id',
												
														
															 'first_name',
															 'last_name',
															 'company_name',
															 'near_by',
															 'address',
															 'country',
															 'state',
															 'city',
															 'zipcode',
															 'telephone',
															 'created_at',
                                                              'updated_at',
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_address';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}