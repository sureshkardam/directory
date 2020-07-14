<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class CustomerReward extends Model
{

	protected $fillable = array('customer_id',
															'order_id',
															'description', 
															 'points',
															 'date_added',
															 'created_at',
															 'updated_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customer_reward';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
