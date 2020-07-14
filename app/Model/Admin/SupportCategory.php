<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class SupportCategory extends Model
{

	protected $fillable = array('category','updated_at','created_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'support_category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	
	public static function getName($id) {
		$cat=Self::find($id);
		return $cat->category;
	}
	
	
}
