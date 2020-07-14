<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class SellerBussiness extends Model
{

	protected $fillable = array('seller_id',
															
															'bussiness_id',
															
															 'created_at',
															 'updated_at'
														);



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'seller_to_bussinesstype';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}