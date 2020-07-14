<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{

	protected $fillable = array('name',
															'description',
															'status', 
															 'created_at',
															 'updated_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customer_group';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public static function getName($id)
	{
	
	$state=Self::find($id);
	if($state)
	{
		return $state->name;
	}else
		
		{
		
		return false;
		}
	
	}
}
