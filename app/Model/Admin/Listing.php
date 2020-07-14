<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\ListingToCategory;

use Illuminate\Support\Arr;

class Listing extends Model
{

	

	protected $guarded = [];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'listing';

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
	$row=\App\Model\Admin\LisitngImage::where('product_id','=',$id)->first();
	
		if($row)
		{
			return $row->main_image;
		}else
			
			{
				return false;
			}
	
		
	}
	
	
	
	
	
	public function getCategories()
	{
		
		return $this->hasMany('\App\Model\Admin\ListingToCategory','listing_id');
		
	}
	
	public function getLocation()
	{
		
		return $this->hasOne('\App\Model\Admin\ListingLocation','listing_id');
		
	}
	
	public function getAdditional()
	{
		
		return $this->hasOne('\App\Model\Admin\ListingAdditional','listing_id');
		
	}
	

	
	
	public function scopeFeatured($query)
		{
			
				return $query->orderBy('created_at', 'desc');
			
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
	
	
	public function scopeTitle($query,$key)
		{
			if ( ! is_null($key)) {
				return $query->Where('listing_title', 'like', '%'.$key.'%');
				//return $query->where('listing_title', '=',$key);
			}
		}


	public function scopeDescription($query,$key)
		{
			if ( ! is_null($key)) {
				return $query->Where('listing_description', 'like', '%'.$key.'%');
				//return $query->where('listing_title', '=',$key);
			}
		}

	
	public function scopeCategory($query,$key)
    {
        if ( ! is_null($key) && (count($key) > 0)) {
			
			
		
			return $query->join('listing_to_category', function($join) use ($key)
            {
                $join->on('listing.id', '=', 'listing_to_category.listing_id')
                        ->whereIn('listing_to_category.category_id',$key);
            });
		}
    }
	
	public function scopeState($query,$key)
    {
        if ( ! is_null($key) && (count($key) > 0)) {
			
			return $query->join('listing_location', function($join) use ($key)
            {
                $join->on('listing.id', '=', 'listing_location.listing_id')
                        ->WhereIn('listing_location.state', $key);
            });
		}
    }
	
	
	public static function getFilterLisiting($data) {
	
	
	
	$lisitngs = Self::select('listing.*')
            ->join('listing_location', 'listing_location.listing_id', '=', 'listing.id')
            ->join('listing_to_category', 'listing_to_category.listing_id', '=', 'listing.id')
			->orderBy('listing.created_at','desc');
	
	
	if($data['filter_location'])
	 {
		
				if(sizeof($data['filter_location']) > 0)
				$lisitngs->whereIn('listing_location.state', $data['filter_location']);
			
		
	 }
	 
	 if($data['filter_category'])
	 {
				
				if(sizeof($data['filter_category']) > 0)
				$lisitngs->whereIn('listing_to_category.category_id', $data['filter_category']);
			
		
	 }
	 
	 if($data['filter_title'])
	 {
		
			
			$lisitngs->where('listing.listing_title', 'like', '%'. $data['filter_title'] . '%');
			$lisitngs->orWhere('listing.listing_description', 'like', '%'. $data['filter_title'] . '%');
			
		
	 }
	 
	 
	 

/*	
//debug
// for laravel 5.8^
$sql = \Illuminate\Support\Str::replaceArray('?', $lisitngs->getBindings(), $lisitngs->toSql());

// print
dd($sql);
	
	exit;
	echo $lisitngs->toSql();
	exit;
//debug off	
*/
	 
	 return $lisitngs->get();
	 
	
	
	
	}
	
}
