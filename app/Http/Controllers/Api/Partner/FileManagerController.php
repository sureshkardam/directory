<?php

namespace App\Http\Controllers\Api\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    		try {
         
          $rules=  [
                'productImage' => 'required',
                'productImage.*' => 'mimes:jpeg,png,jpg|max:2048'
             ];
    			 $validator = Validator::make($request->all(),$rules);
       			 
       			 if ($validator->fails()) {
                    $errors=$validator->errors()->first();
                  return response()->json(['status'=>"failed", 'errors' =>$errors,'status'=>422 ],422);
       			  

       			 }else{
             
       			 	 if($request->has('productImage')){
    	 			 $path=Helper::get_image_path();
                     $upload = public_path($path);

	    	 		foreach($request->file('productImage') as $file) { 

	    	 			$image_upload=Helper::BulkImageUpload($file,$path);

	    	 		}


    			 }

       			 }
    			   

    			
    			
    			 return response()->json(['success' =>true, 'msg' =>'Sucessfully upload Product','status'=>200 ],200);
    		} catch (Exception $e) {
    			 return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
    		}
    	

    }

    
	private function user_id(){
		 return Auth::user()->id;

	}

	private function get_email(){
		 return Auth::user()->email;

	}

  


}
