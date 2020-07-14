<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

	protected $fillable = array('name',
															'attribute_group_id',
															'sort_order',
															'status', 
															 'created_at',
															 'updated_at'
														);

	public function attributegroup()
    {
        return $this->belongsTo('App\Model\Admin\AttributeGroup');
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attribute';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	
	public static function getName($id)
	{
	
	$attr=Self::find($id);
	if($attr)
	{
		return $attr->name;
	}else
		
		{
		
		return false;
		}
	
	}
}
