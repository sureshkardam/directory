<?php

namespace App\Http\Controllers;

//use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\Manufacture;
use App\Model\Admin\Attribute;
use App\Model\Admin\AttributeGroup;
use App\Model\Admin\Filter;
use App\Model\Admin\FilterGroup;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Helper;

class FileManagerController extends Controller
{
     public function index(Request $request){
    	$app_path = storage_path('app/public');
    	/* $arrayName = array(
    		'action' =>'read',
    		
    		'data'=>array()
    	 );*/
    	 //return response()->json($arrayName,200);
    	/*print_r($request->all());
    	exit;
    	return public_path('test-folder\1567591316.png');
    	exit;*/
    	/*$contents = Storage::get('1567591316.png');
    	print_r($contents);
    	exit;
*/
    	

    	
    	
    	/*echo "<pre>";
    	print_r($request->all());
    	exit;*/

    }

    public function bulkUplodFiles(Request $request){
    		
		 if ($request->isMethod('post')) { 
			
			
			
			try {
       			 	 if($request->has('productImage'))
					 
					{
    	 			 $path=Helper::get_image_path();
                     $upload = public_path($path);

						foreach($request->file('productImage') as $file) { 

							$image_upload=Helper::BulkImageUpload($file,$path);

						}
					
					}

    			 return redirect()->route('admin.product')->with('success', 'Sucessfully upload Images!');
				 //return response()->json(['success' =>true, 'msg' =>'Sucessfully upload Images','status'=>200 ],200);
    		} catch (Exception $e) {
    			 //return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
				 return redirect()->route('admin.product')->with('error', $e->getMessage());
    		}
    	
		 }else
			 
		 
		 {
			 
			return view('admin.bulk-product-image-upload');
			 
		 }
    }

    
	private function user_id(){
		 return Auth::user()->id;

	}

	private function get_email(){
		 return Auth::user()->email;

	}
	
	
}