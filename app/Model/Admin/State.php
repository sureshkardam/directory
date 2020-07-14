<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

	protected $fillable = array('name',
															'country_id',
															'status',
															'updated_at', 
															 'created_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'states';

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
		
		
		public function scopeSearch($query,$key)
		{
			if ( ! is_null($key)) {
				return $query->where('name', 'like', '%'.$key.'%');
			}
		}
		
		public function scopeStatus($query)
    {
        
            return $query->where('status', '=', 1);
        
    }
	
	public static function getID($name)
	
	{
		
		if($name)
		{
		
		$state=Self::where('name','like','%' . $name . '%')
									->where('country_id','=',38)
									->first();
		if($state)
		{
			return $state->id;
		}else
			
			{
				return false;
			}
			
			
		}else
			
			{
			return false;	
				
			}
	}
	
	
	
	
	public static function getCanadaStates()
	
	{
		$state=Self::where('country_id','=',38)->get();
		return $state;
		
	}
		
}
