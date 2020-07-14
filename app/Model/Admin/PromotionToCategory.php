<?php

namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class PromotionToCategory extends Model
{

	protected $fillable = array('promotion_id',
															
															'category_id',
															 'created_at',
															 'updated_at'
														);
	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'promotion_to_category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	
}
