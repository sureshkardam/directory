<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

	protected $fillable = array('name',
															'type',
															'sort_order',
															'status',
															'updated_at', 
															 'created_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'option';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public function getValues()
	{
		return $this->hasMany('App\Model\Admin\OptionValue','option_id');
		
	}
	
	public static function getName($id)
	{
		$option=Self::find($id);
		if($option)
		{
			return $option->name;
		}else
			
			{
				return false;
			}
		
		
	}
	
}
