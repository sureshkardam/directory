<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Commision extends Model
{

	protected $fillable = array('country_id',
		                                                    'state_id',
															'category_id',
															'percentage',
															'status',
															'created_at',
															'updated_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'commision';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();



}
