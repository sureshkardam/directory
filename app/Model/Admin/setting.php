<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

	protected $fillable = array('meta_title',
												              
												              'store_name',
														     'store_owner',
															 'address',
															 'email',
															 'telephone',
															 'country',
															 'state',
															 'length_class',
															 'weight_class',
															 'store_logo',
															 'icon',
															 'mail_engine',
															 'mail_parameters',
															 'smtp_hostname',
															 'smtp_username',
															 'smtp_password',
															 'smtp_port',
															 'smtp_timeout',
															 'alert_mail',
															 'additional_alert_mail',
															
																'status', 
																'product_approve',
															 'created_at',
                                                              'updated_at',
														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'setting';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}