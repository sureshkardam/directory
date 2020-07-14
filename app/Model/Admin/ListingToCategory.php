<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class ListingToCategory extends Model
{

	protected $fillable = array('listing_id',
															'category_id'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'listing_to_category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
