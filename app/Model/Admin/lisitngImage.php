<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{

	protected $guarded = [];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'listing_image';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
