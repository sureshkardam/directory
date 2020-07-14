<?php
namespace App\Model\Admin;
use Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

	protected $fillable = array('user_id',
												
														    
															 'first_name',
															 'last_name',
															 'company_name',
															 'bussiness_description',
															 'bussiness_type',
															 'address',
															 'country',
															 'state',
															 'city',
															 'zipcode',
															 'telephone',
															 'status',
															 'created_at',
                                                              'updated_at',
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_profile';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}