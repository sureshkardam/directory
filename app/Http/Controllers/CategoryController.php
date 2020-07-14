<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\CategoryPath;
use DB;

class CategoryController extends Controller
{

    
	
	
	public function listAll(Request $request)
    {
       
		
		
					
					//$parent=$category->parent_id;
					$listings=Category::getAllListings();			
					$subCategory=Category::where('parent_id','=',0)->where('status','=',1)->get();

		
		return view('front.list',compact('subCategory','listings'));
		
		//$returnHTML = view('frontend.catalog.cart-right-block')->render();
		//return response()->json(array('success' => 1, 'msg' => $returnHTML));
		
    }
	
	
	public function index(Request $request,$slug)
    {
       
		
		$category = Category::where('seo_url','=',$slug)->first();
		
		if($category)
			{
				
					
					$parent=$category->parent_id;
					$listings=Category::getListings($category->id);			
					$subCategory=Category::where('parent_id','=',$category->id)->where('status','=',1)->get();

					
			
			}else
			
			{
				
				abort(404);
			}
		
		
		
		
		
		return view('front.list',compact('subCategory','listings','parent'));
		
		//$returnHTML = view('frontend.catalog.cart-right-block')->render();
		//return response()->json(array('success' => 1, 'msg' => $returnHTML));
		
    }
	
	
	public function listingByLocation(Request $request,$id)
    {
       
		
		
		
		if($id)
			{
				
					
					
					$listings=Category::getListingsByLocation($id);			
					$subCategory=Category::where('parent_id','=',0)->where('status','=',1)->get();

					
			
			}else
			
			{
				
				abort(404);
			}
		
		
		
		
		
		return view('front.list',compact('subCategory','listings'));
		
		//$returnHTML = view('frontend.catalog.cart-right-block')->render();
		//return response()->json(array('success' => 1, 'msg' => $returnHTML));
		
    }
	
	
	
	public function listProduct(Request $request,$cat)
    {
	
	$products=Category::getProducts($cat);
	
	
	foreach($products as $product)
	{
	print_r($product['name']);
	echo"<br>";
	}
	exit;
	
	
	}
}
