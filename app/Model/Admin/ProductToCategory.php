<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class ProductToCategory extends Model
{

	protected $fillable = array('product_id',
															'category_id'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_to_category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
