<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{

	protected $fillable = array('user_id',
															'category',
															'subject',
															'description', 
															 'updated_at', 
															 'created_at'
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'support';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	public function apComments() {
		return $this->hasMany('App\Model\Admin\SupportComment', 'support_id');
	}
}
