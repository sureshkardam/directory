<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class FilterGroup extends Model
{

	protected $fillable = array('name',
															'sort_order',
															'status',
															'created_at',
															'updated_at',
														);

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'filter_group';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
