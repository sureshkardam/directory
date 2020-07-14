<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{

	protected $fillable = array('title',
															
															'seo_url',
															'meta_title', 
															 'meta_description',
															 'description',
															 'status',														 
															 'created_at',
															 'updated_at',

														);



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'information';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}