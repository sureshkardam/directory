<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{

	protected $fillable = array('product_id',
															'customer_group_id',
															'quantity',
															'priority',
															'price',
															'date_start',
															'date_end',
															 'created_at',
															 'updated_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product_discount';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
