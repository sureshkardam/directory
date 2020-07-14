<?php
namespace App\Model\Admin;
use Searchable;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Model\Admin\ListingToCategory;
use App\Model\Admin\Listing;


class Category extends Model
{

	protected $fillable = array('name',
															'description',
															'meta_title',
															'meta_description', 
															 'meta_keyword',
															 'image',
															 'parent_id',
															 'top',
															 'sort_order',
															 'status',
															 'created_at',
															 'updated_at'

														);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public static function getCategory(){
	
		$sql = "SELECT cp.category_id AS category_id, GROUP_CONCAT(cp.category_name ORDER BY cp.level SEPARATOR ' > ') AS name FROM category_path cp LEFT JOIN category c1 ON (cp.category_id = c1.id) LEFT JOIN category c2 ON (cp.path_id = c2.id) GROUP BY cp.category_id";
	
		
		$category=DB::select( DB::raw($sql) );
		

		if($category){
			return $category;
		}else{

			return $category=[];
		}
		
	}

	public static function getCategoryStatus($id){
		$data=self::where('id',$id)->first();
		if(!empty($data)){
			return $data->status;
		}

	}
	
	public static function getName($id)
	{
	
	$category=Self::find($id);
	if($category)
	{
		return $category->name;
	}else
		
		{
		
		return false;
		}
	
	}
	public static function getSortOrder($id)
	{
	
	$category=Self::find($id);
	if($category)
	{
		return $category->sort_order;
	}else
		
		{
		
		return false;
		}
	
	}


public static function getCreated($id)
	{
	
	$category=Self::find($id);
	if($category)
	{
		return $category->created_at;
	}else
		
		{
		
		return false;
		}
	
	}


/*

	public static function getProfile($id)
	{
	
	$category=Product_to_Category::find($id);
	if($category)
	{
		return $category->name;
	}else
		
		{
		
		return false;
		}
	
	}
	
	*/
	
	public function parent() {
		return $this->belongsTo(self::class, 'parent_id');
	}

	public function children() {
		return $this->hasMany(self::class, 'parent_id','id');
	}
	
	
	
	
	
	public static function getAllListings()
    {
		
		$result=Listing::orderBy('created_at','desc')->get();
		return $result;
		
	}
	
	public static function getListings($id)
    {
       
	   
	   //$data=[];
		//$products =$this->hasMany('\App\ProductToCategory','category_id','id');
		$listings =ListingToCategory::where('category_id','=',$id)->orderBy('created_at','desc')->get();
		
		
		$result=[];
		if($listings)
		{
					foreach($listings as $listing)
					{
						
						$result[]=Listing::where('id','=',$listing->listing_id)
										->first();
						
						
						
						
					}
					
					return $result;
		 }else
		{
					return false;

		}
		
		
		
    }
	
	public static function getListingsCount($slug)
    {
       
	   
	   $category = Self::where('seo_url','=',$slug)->first();
		
		if($category)
			{
	   
	   
	   //$data=[];
		//$products =$this->hasMany('\App\ProductToCategory','category_id','id');
		$listings =ListingToCategory::where('category_id','=',$category->id)->orderBy('created_at','desc')->get();
		
		
		$result=[];
		if($listings)
		{
					foreach($listings as $listing)
					{
						
						$result[]=Listing::where('id','=',$listing->listing_id)
										->first();
						
						
						
						
					}
					
					return sizeof($result);
		 }else
		{
					return false;

		}
		
		
		
	}else
		
		{
			return false;
		}
		
    }
	
	
	
	public static function getListingsByLocation($id)
    {
       
	   
	   //$data=[];
		//$products =$this->hasMany('\App\ProductToCategory','category_id','id');
		$listings =ListingLocation::where('state','=',$id)->orderBy('created_at','desc')->get();
		$result=[];
		if($listings)
		{
					foreach($listings as $listing)
					{
						
						$result[]=Listing::where('id','=',$listing->listing_id)
										->first();
						
						
						
						
					}
					
					return $result;
		 }else
		{
					return false;

		}
		
		
		
    }
	
	
	
	public static function getListingsByLocationCount($id)
    {
       
	   
	   //$data=[];
		//$products =$this->hasMany('\App\ProductToCategory','category_id','id');
		$listings =ListingLocation::where('state','=',$id)->orderBy('created_at','desc')->get();
		$result=[];
		if($listings)
		{
					foreach($listings as $listing)
					{
						
						$result[]=Listing::where('id','=',$listing->listing_id)
										->first();
						
						
						
						
					}
					
					return sizeof($result);
		 }else
		{
					return false;

		}
		
		
		
    }
	
	
	
	
	
	
}
