<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{


	protected $table = 'website';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	
	
	public static function getName($id)
	{
		$website=Self::find($id);
		if($website)
		{
			return $website->name;
		}else
			
			{
				return false;
			}
		
		
	}
	
}
