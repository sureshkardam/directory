<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class CustomerWishlist extends Model
{

	protected $fillable = array('category_id',
															'product_id',
															'date_added',
															'created_at',
															'updated_at'

														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customer_wishlist';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
