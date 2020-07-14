<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Product;
use App\Model\Admin\Manufacture;
use App\Model\Admin\Category;
use App\Model\Admin\ProductToCategory;
use App\Model\Admin\ProductImage;
use App\Model\Admin\Support;
use App\Model\Admin\SupportCategory;
use App\Model\Admin\SupportComment;
use Auth;

class SupportController extends Controller
{

	public function index(){
		$data['supports']=Support::all();
		return view('admin.support-list',$data); 
	}
	
	
	public function editSupport(Request $request,$id) {
		//$id     = Auth::user()->id;
		$data['support']   = Support::where('id', '=', $id)->first();
        $data['supportCategory'] = SupportCategory::All();
		
		 if ($request->isMethod('get')) {
					
			return view('admin.edit-support',$data); 						 
		}
		else {
			/*
			$errors = false;
			
			$subject = $request->input('subject');	
			$description = $request->input('description');
			
			$input = array(
									'subject' 		=> $subject,
									'description'					=> $description,
									
										);
				$validate = Validator::make($input, array(
					'subject' 		=> 'required|min:3|max:200',
					'description'	=> 'required|min:3|max:500',
					
																									));
				if ($validate->fails()){
					Session::flash('error', 'There are errors on this page. Please review them.');

					return Redirect::back()->withInput($request->input())
																->with('errorMsg', $validate->messages());
				}
				else {
					//Lets save the job
					
					
					
					$support->subject=$subject;
					$support->description=$description;
					
					$support->save();
					return redirect()->back()->with('message', 'Support Request Updated succesfully!');
				*/	
				}
		
	}
	
    public function addCommnet(Request $request) {
				
				
						$support_id         = $request->input('support_id');
						$description     	= $request->input('description');
						
						
						
						
						
						$comments= new SupportComment();
						
						$comments->user_id=1;
						$comments->support_id=$support_id;
						$comments->description=$description;
						$comments->save();
						
						return redirect()->back()->with('message', 'Comments Added!');
						
				}


    public function image_upload($image){
       $name = time().'.'.$image->getClientOriginalExtension(); //get the  file extention
       $destinationPath = public_path('/product-image'); //public path folder dir
       $sucess=$image->move($destinationPath, $name);  //mve to destination you mentioned 
      if ($sucess) {
            return 'product-image/'.$name;
        }

        return NULL;

    }
}
