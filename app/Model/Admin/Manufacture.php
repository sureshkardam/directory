<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'manufacturer';
	protected $guarded = [];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	
	public static function getID($name)
	
	{
		
		if($name)
		{
		
		$brand=Manufacture::where('name','=',$name)->first();
		if($brand)
		{
			return $brand->id;
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
