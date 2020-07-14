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
use App\Model\Admin\Setting;
use App\User;





class SettingController extends Controller
{
   
    public function createSetting(Request $request){
     
     //$countries=Country::where('status','=',1)->get();
     $countries=Country::all();

    $setting = Setting::where('id','=', 1)->first();
    

       
			  
	if ($request->isMethod('get')) {
      	 return view('admin.edit_setting',compact('setting','countries'));
         }
      
      else{
         
           // echo "<pre>";
           // print_r($request->all());
           // exit;


		 
		 $validatedData = $request->validate([
               'meta_title' => 'required',
               'store_name' => 'required',
               'store_name' => 'required',
               'store_owner' => 'required',
               'address' => 'required',
               'email' => 'required',
               'telephone' => 'required',
               'country' => 'required',
               'state' => 'required',
               'length_class' => 'required',
               'weight_class' => 'required',
               // 'store_logo' => 'required',
              // 'icon' => 'required',
               'mail_engine' => 'required',
               'mail_parameters' => 'required',
               'smtp_hostname' => 'required',
               'smtp_username' => 'required',
               'smtp_password' => 'required',
               'smtp_port' => 'required',
               'smtp_timeout' => 'required',
               //'alert_mail' => 'required',
              

               
                ]);



 if( $request->hasFile('store_logo')){ 
                    $store_logo = $request->file('store_logo'); 


                    $store_logo_path=$this->image_upload($store_logo);
                                
                   
                   
      
                }

                if( $request->hasFile('icon')){ 
                    $icon = $request->file('icon'); 


                    $icon_path=$this->image_upload($icon);
                                
                   
                }else


                {
                $store_logo_path=    $setting->store_logo;
                 $icon_path=$setting->icon;


                }


                  
                  

                // echo "<pre>";
                // print_r($insert_data);
                // exit();


          
        $meta_title = $request->input('meta_title');
        $store_name = $request->input('store_name');
        $store_owner = $request->input('store_owner');
        $address = $request->input('address');
        $email = $request->input('email');
        $telephone = $request->input('telephone');
        $country = $request->input('country');
        $state = $request->input('state');
        $length_class = $request->input('length_class');
        $weight_class = $request->input('weight_class');
        //$store_logo = $request->input('store_logo');
      //$icon = $request->input('icon');
        $mail_engine = $request->input('mail_engine');
        $mail_parameters = $request->input('mail_parameters');
        $smtp_hostname = $request->input('smtp_hostname');
        $smtp_username = $request->input('smtp_username');
        $smtp_password = $request->input('smtp_password');
        $smtp_port = $request->input('smtp_port');
        $smtp_timeout = $request->input('smtp_timeout');
        $alert_mail = $request->input('alert_mail');
        $additional_alert_mail = $request->input('additional_alert_mail');
        $status = $request->input('status');
       
        
            
           
        $data=array('meta_title'=>$meta_title,
                    'store_name'=>$store_name,
                    'store_owner'=>$store_owner,
                    'address'=>$address,
                    'email'=>$email,
                    'telephone'=>$telephone,
                    'country'=>$country,
                    'state'=>$state,      
                    'length_class'=>$length_class,
                    'weight_class'=>$weight_class,
                    'store_logo'=>$store_logo_path,
                    'icon'=>$icon_path,
                    'mail_engine'=>$mail_engine,
                    'mail_parameters'=>$mail_parameters,
                    'smtp_hostname'=>$smtp_hostname,
                    'smtp_username'=>$smtp_username,
                    'smtp_password'=>$smtp_password,
                    'smtp_port'=>$smtp_port,
                    'smtp_timeout'=>$smtp_timeout,
                    'alert_mail'=>$alert_mail,
                    'additional_alert_mail'=>$additional_alert_mail,
                    'status'=>$status,
                          
                        ); 



     //     echo "<pre>";
     // print_r($data);
     // exit();


              
			  Setting::where('id','=', 1)->update($data);
			  
			  //Setting::create($data);
              return redirect()->back()->with('message', 'Successfully Updated!');
      }



}


public function image_upload($image){
       $name = time().'.'.$image->getClientOriginalExtension(); //get the  file extention
     

       $destinationPath = public_path('/setting-image'); //public path folder dir
       $sucess=$image->move($destinationPath, $name);  //mve to destination you mentioned 
      if ($sucess) {
            return 'setting-image/'.$name;
        }

        return NULL;

    }


}
