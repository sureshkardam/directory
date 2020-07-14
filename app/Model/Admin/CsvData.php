<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;

class CsvData extends Model
{
    protected $table = 'csv_data';
    protected $fillable = ['csv_filename', 'csv_header', 'records','csv_data','status','categories','maparray','created_at','updated_at'];
	
	protected $hidden = array();
}