<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class CategoryPath extends Model
{

	protected $fillable = array('category_id',
															'path_id',
															'category_name',
															'level',
															'created_at',
															'updated_at'

														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category_path';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
