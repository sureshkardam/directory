<?php

namespace App\Http\Controllers\Admin;

//use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Support\Facades\Validator;
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

use App\User; 
use Auth;
use Hash;



class HomeController extends Controller
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
  

    public function index()
    {
        
        return view('admin.theme.home');
    }
	
	
 public function login(Request $request)
    {
        
			$email     =$request->input('email');
		    $password = $request->input('password');
		    $input    = array(
                'Email' => $email,
                'Password' => $password
              
            );
            
            $errors='';
            $validate1 = Validator::make($input, array(
                'Email' => 'required|min:5|max:120',
                'Password' => 'required|min:5|max:60'
            ));
            if ($validate1->fails()) {
                $errors = true;
            }
           
            
            if ($errors) {
				$appInfoErrorMsg='';
            if ($validate1->messages())
                    $validate1ErrorMsg = $validate1->messages();
			return Redirect::back()->withInput($request->input())->with('appLoginErrors', $validate1ErrorMsg);
			} else {
            $user_email = User::where('email', '=', $email)->first();
               
                if ($user_email  && $user_email->status=='1') {
					
					 if (Hash::check($password, $user_email->password)) {
                     
                        Auth::login($user_email);
					
						if(Auth::user()->user_type =='0')
						{
							
							return redirect()->route('admin.home');
						
						}else
						
									{
										
									  ///
										
									}
						
						
						} else {
						
							session()->flash('credential_error', 'Please check password.');
    						return redirect()->back();
						
							}
                } else {
                   
				
				session()->flash('credential_error', 'Please check the email and password.');
    			return redirect()->back();
				
				
                }
                
                
            }
				
    }
	
    
	 public function logout()
    {
        
       // Session::flush();
		Auth()->logout();
	
	return redirect()->to('/');
    }

}
