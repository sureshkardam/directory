<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Product;
use App\Model\Admin\Manufacture;
use App\Model\Admin\Category;
use App\Model\Admin\ProductToCategory;
use App\Model\Admin\ProductImage;
use App\Model\Admin\Option;
use App\Model\Admin\OptionValue;
use App\Model\Admin\Attribute;
use App\Model\Admin\AttributeGroup;
use App\Model\Admin\ProductAttribute;

use App\Model\Admin\ProductOption;
use App\Model\Admin\ProductOptionValue;
use App\User;




use Illuminate\Support\Arr;

class BulkUpdateStatus extends Controller
{

	public function index(Request $request){
	

		$categories=Category::getCategory();
		$sellers = User::where('user_type','=','1')
						->where('status','=','1')
						->get();

	 if ($request->isMethod('post')) { 



	 		$category = $request->input('category');
	 		$status = $request->input('status');
	 		$approval = $request->input('approval');
			$seller = $request->input('seller');
			$cat = $request->input('cat');
			$products = Product::Status($status)->Approval($approval)->Seller($seller)->Category($cat)->get();
			
			
			return view('admin.bulkupdatestatus',compact('products','categories','sellers'));
   

 }else


 {

	$products=Product::orWhere('quantity','=','0')
					->orWhere('stock_status_id','=','0')
					->get();
    

     return view('admin.bulkupdatestatus',compact('products','categories','sellers'));


 }


	}
	
	

}
