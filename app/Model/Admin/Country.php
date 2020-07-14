<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

	protected $fillable = array('code',
															'name',
															'phonecode',
															'status',
															'updated_at', 
															 'created_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'countries';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();


	public static function getAll()
	{
	
	$country=Self::all();;
	if($country)
	{
		return $country;
	}else
		
		{
		
		return false;
		}
	
	}


	public static function getName($id)
	{
	
	$country=Self::find($id);
	if($country)
	{
		return $country->name;
	}else
		
		{
		
		return false;
		}
	
	}
	
	
	
	
	public static function getID($name)
	
	{
		
		if($name)
		{
		
		$country=Self::where('name','=',$name)->first();
		if($country)
		{
			return $country->id;
		}else
			
			{
				return false;
			}
			
			
		}else
			
			{
			return false;	
				
			}
	}
	
	
	
	
}
