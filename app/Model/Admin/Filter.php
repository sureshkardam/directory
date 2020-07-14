<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{

	protected $fillable = array('name',
															'filter_group_id',
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
	protected $table = 'filter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public static function getName($id)
	{
	
	$filter=Self::find($id);
	if($filter)
	{
		return $filter->name;
	}else
		
		{
		
		return false;
		}
	
	}
	
}
