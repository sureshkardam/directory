<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;

class CategoryController extends Controller
{
   public function getAllcategory(){
    	try {
    		//print_r(Auth::user());
    		
    		$categories=Category::getCategory();
            //$attributes=Attribute::where('status',1)->get();

    		 return response()->json($categories,200);

    	} catch (Exception $e) {
    		 return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
    	}
    	
    }
}
