<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\ProductToCategory;

class Product extends Model
{

	/*protected $fillable = array('user_id',
								'ikozy_id',
								'name',
								'description',
								'meta_title',
								'meta_description',
								'meta_keyword',
								'model',
								'sku',
								'quantity',
								'stock_status_id',
								'manufacturer_id',
								'price',
								'discount_price',
								'subtract',
								'minimum',
								'sort_order',
								'status',
								'viewed',
								'created_at',
								'updated_at',							
								);
								*/

	protected $guarded = [];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
	
	public function getImages()
	{
		
	return $this->hasMany('\App\Model\Admin\ProductImage','product_id');
		
	}
	
	
	public static function getSingleImage($id)
	{
		
	//return $this->hasMany('\App\Model\Admin\ProductImage','product_id');
	$row=\App\Model\Admin\ProductImage::where('product_id','=',$id)->first();
	
		if($row)
		{
			return $row->image;
		}else
			
			{
				return false;
			}
	
		
	}
	
	
	
	public function getOptions()
	{
		
		return $this->hasMany('\App\Model\Admin\ProductOption','product_id');
		
		
	}
	
	public function getOptionValues()
	{
		
		return $this->hasMany('\App\Model\Admin\ProductOptionValue','product_id');
		
	}
	/*
	public function getAttributes($id)
	{
		
		
		$attributes=\App\Model\Admin\ProductAttribute::where('product_id','=',$id)->get();
		if($attributes)
		{
			return $attributes;
		}else
		{
			return false;
		}
		
		
	}*/
	public static function getAttributeValues($id)
	{
		
		
		$attributes=\App\Model\Admin\ProductAttribute::where('product_id','=',$id)->get();
		if($attributes)
		{
			return $attributes;
		}else
		{
			return false;
		}
		
		
	}
	
	public function getCategories()
	{
		
		return $this->hasMany('\App\Model\Admin\ProductToCategory','product_id');
		
	}

	public function scopeUser($query,$key)
		{
			if ( ! is_null($key)) {
				//return $query->where('status', 'like', '%'.$key.'%');
				return $query->where('user_id', '=',$key);
			}
		}


	public function scopeStatus($query,$key)
		{
			if ( ! is_null($key)) {
				//return $query->where('status', 'like', '%'.$key.'%');
				return $query->where('status', '=',$key);
			}
		}


	public function scopeApproval($query,$key)
		{
			if ( ! is_null($key)) {
				//return $query->where('status', 'like', '%'.$key.'%');
				return $query->where('is_admin_approved', '=',$key);
			}
		}


	public function scopeSeller($query,$key)
		{
			if ( ! is_null($key)) {
				//return $query->where('status', 'like', '%'.$key.'%');
				return $query->where('user_id', '=',$key);
			}
		}
	/*
	public function scopeCategory($query,$key)
		{
			if ( ! is_null($key)) {
				
				
				
				
				//return $query->where('status', 'like', '%'.$key.'%');
				return $query->where('user_id', '=',$key);
			}
		}

	*/
	public function scopeCategory($query,$key)
    {
        if ( ! is_null($key)) {
			return $query->join('product_to_category', function($join) use ($key)
            {
                $join->on('product.id', '=', 'product_to_category.product_id')
                        ->where('product_to_category.category_id', '=', $key);
            });
		}
    }
	
}
