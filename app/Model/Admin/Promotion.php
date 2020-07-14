<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

	protected $fillable = array('user_id','promotion_code',
		                                                    'promotion_conditions',
															'promotion_amount',
															'min_spend_amount',
															'max_spend_amount', 
															// 'category',
															// 'sub_category',
															'select_user_role',
															'status',
															'start_date',
															'end_date',
															 'created_at',
															 'updated_at'
														);

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'promotions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
