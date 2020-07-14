<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

	protected $fillable = array('name',
															'state_id',
															'status',
															'updated_at', 
															 'created_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';

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
}
