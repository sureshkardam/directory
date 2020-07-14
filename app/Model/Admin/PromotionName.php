<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class PromotionName extends Model
{

	protected $fillable = array('name',
															
															'sort_order',
															'status', 
															 'created_at',
															 'updated_at'
														);
	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'promotion_name';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	/*public function getPromoCat()
	{
		
		return $this->hasMany('\App\Model\Admin\PromotionToCategory','promotion_id');
		
	}*/
	
	
}