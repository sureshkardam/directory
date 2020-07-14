<?php

namespace App\Http\Controllers\Admin;

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
use App\Model\Admin\Promotion;
use App\Model\Admin\UserProfile;
use App\Model\Admin\BusinessType;
use App\Model\Admin\SellerBussiness;
use App\Model\Admin\Product;
use Illuminate\Support\Arr;

use App\User;                                                  
use Hash;





class SellerProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }
*/
  

    public function showSeller()
    {
         
		 $user = User::where('status','=',1)
						->where('user_type','=',1)
						->get();
		
			$userProfile = UserProfile::all();
						
         return view('admin.seller-list', compact('user','userProfile'));

    }
    

 


     
    public function createSeller(Request $request){
				
				 
				 //$countries=Country::where('status','=',1)->get();
				  $countries=Country::all();
				 //$business=BusinessType::where('status','=',1)->get();
				  $business=BusinessType::all();
				 
				 if ($request->isMethod('get')) {
				
				 return view('admin.create-seller',compact('countries','business'));
				
				
				 }else
				 {



			 $validatedData = $request->validate([
		  'email' => 'required|email',
		  'first_name' => 'required',
		  'last_name' => 'required',
		  'company_name' => 'required',
		  'bussiness_description' => 'required',
		 'address' => 'required',
		 'country' => 'required',
		 'state' => 'required',
		 'city' => 'required',
         'zipcode' => 'required',
         //'zipcode' => 'required',
         'telephone' => 'required',
         'password' => 'required',
        'confirm_password' => 'required_with:password|same:password'
				
                   ]);





		//user detail	
        $email = $request->input('email');
        $password = $request->input('password');
		$reenterpass = $request->input('reenterpassword');
		
		//user profile
		
		$fname = $request->input('first_name');
        $lname = $request->input('last_name');
        $cname = $request->input('company_name');
        $bussiness_description = $request->input('bussiness_description');
        $bussinessType = $request->input('bussiness_type');
        $address = $request->input('address');
        $country = $request->input('country');
        $state = $request->input('state');
        $city = $request->input('city');
          $status = $request->input('status');
       
        $zip = $request->input('zipcode');    
        $telephone = $request->input('telephone');


        $find = User::where('user_type','=',1)
					->where('email','=',$email)
						->first();


		if($find)
		{

			return redirect()->back()->with('error', 'Seller Already Exists!');
		}else
		{

			 
			$user = User::create(array(
                    'name' =>$request->input('first_name').' '.$request->input('last_name'),
                    'email' => $email,
                    'password' => Hash::make($password),
					'reset_profile' => '',
                    'user_type' => '1',
					
                ));
				

		
		
			
			
			foreach($bussinessType as $bussiness)
			
			{
			
			$SellerBussiness = SellerBussiness::create(array(
                    'seller_id'=>$user->id,
                    'bussiness_id' => $bussiness
                ));
				
			
			}
			
		
						
			$userProfile = UserProfile::create(array(
						 'user_id'=>$user->id,
						 'email' => $email,
                         'first_name'=>$fname,
                          'last_name'=>$lname,
                          'company_name'=>$cname,
                          'bussiness_description'=>$bussiness_description,
                          //'bussiness_type'=>$bussinessType,
                          'address'=>$address,
                          'country'=>$country,
                          'state'=>$state,
                          'city'=>$city,
                          'status'=>$status,
                          'zipcode'=>$zip,
                          'telephone'=>$telephone
                ));

			
				

             
     return redirect()->route('admin.seller.list')->with('message', 'Successfully Created!');
			 
		

     	}

				 }
				

}

public function editSeller(Request $request,$id){
        
    
	$user= User::where('id','=',$id)->first();
	//$seller = UserProfile::where('user_id','=',$id)->get();

	//$countries= Country::where('status','=',1)->get();
    $countries= Country::all();

	//$states= State::where('status','=',1)->get();
	$states= State::all();


	//$cities= City::where('status','=',1)->get();
    $cities= City::all();

	//$bussiness= BusinessType::where('status','=',1)->get();
    $bussiness= BusinessType::all();

	//$sellerBussiness= SellerBussiness::where('seller_id','=',$user->id)->get();
	$promoCat=SellerBussiness::where('seller_id','=',$id)->get();
	 $mid = json_decode(json_encode($promoCat), true);
    $sellerBussinessType = Arr::pluck($mid, 'bussiness_id');

	
      
    if ($request->isMethod('get')) {
         
   

         return view('admin.edit-seller',compact('bussiness','sellerBussinessType','countries','states','cities','user'));
       
  
}
else{

	 $validatedData = $request->validate([
		  //'email' => 'required',
		  'first_name' => 'required',
		  'last_name' => 'required',
		  'company_name' => 'required',
		  'bussiness_description' => 'required',
		 'address' => 'required',
		 'country' => 'required',
		 'state' => 'required',
		 'city' => 'required',
         'zipcode' => 'required',
         //'zipcode' => 'required',
         'telephone' => 'required',
         //'password' => 'required',
        //'confirm_password' => 'required_with:password|same:password'
				
                   ]);	 	
       
        $user_email = $request->input('email');
        
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $company_name = $request->input('company_name');
        $bussiness_description = $request->input('bussiness_description');
        $insertBussinessType = $request->input('bussiness_type');
        $address = $request->input('address');
        $country = $request->input('country');
        $state = $request->input('state');
        $city = $request->input('city');
        $zip = $request->input('zipcode');    
        $telephone = $request->input('telephone');



			$user->getProfile->first_name=$first_name;
			$user->getProfile->last_name=$last_name;
			$user->getProfile->company_name=$company_name;
			$user->getProfile->bussiness_description=$bussiness_description;
			$user->getProfile->address=$address;
			$user->getProfile->country=$country;
			$user->getProfile->state=$state;
			$user->getProfile->city=$city;
			$user->getProfile->zipcode=$zip;
			$user->getProfile->telephone=$telephone;
			$user->getProfile->save();
        
		SellerBussiness::where('seller_id','=',$user->id)->delete();

		//print_r($request->all());
		
		
		foreach($insertBussinessType as $bussiness)
			
			{
			
			$sellerBussiness = SellerBussiness::create(array(
                    'seller_id'=>$user->id,
                    'bussiness_id' => $bussiness
                ));
				
			
			}


    


	
		
       return redirect()->route('admin.seller.list')->with('message', 'Successfully Updated Profile!');
    }

}
 
     public  function deleteSeller($id){
         

$find = Product::where('user_id',$id)->get();


          if($find->count() > '0')
           {
             return redirect()->back()->with('error', 'This Seller is associated with the Products. Not able to delete!');
        }
        else
        {

           User::where('id',$id)->delete();
           //UserProfile::where('user_id',$id)->delete();
            return redirect()->back()->with('message', 'Successfully Deleted!');
        }
         

            }    

                

}
