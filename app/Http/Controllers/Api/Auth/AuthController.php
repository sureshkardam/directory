<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use \App\Http\Requests\Api\RegisterRequest;
use \App\Http\Requests\Api\passwordRequest;
use \App\Http\Requests\Api\LoginRequest;
use \App\Model\Admin\UserProfile;
use App\Model\PasswordReset;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use Helper;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
      try {
  
        
        $user= User::create([
            'name' => $request->first_name.' '.$request->last_name,
            'user_type'=>1,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user->id){
            $user_profile= [
            'user_id'=>$user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'telephone' => $request->telephone,
            'company_name'=>$request->company_name,
            'email' => $request->email,
            'bussiness_description'=>$request->business_description,
            'bussiness_type'=>isset($request->bussiness_type)?implode('-', $request->bussiness_type):NULL,
            'country'=>$request->country,
            'state'=>$request->state,
            'zipcode'=>$request->zipcode,
            'address'=>$request->address,
            'city'=>isset($request->city)?$request->city:NULL,
           
        ];

            $path=Helper::getImagefolder($request->email,$user->id);
            $update_path = User::where('id',$user->id)->update(['user_image_path'=>$path]);

              UserProfile::create($user_profile);
        }
        // $token = $user->createToken('ikozy')->accessToken;
         $tokenResult = $user->createToken('ikozy');
                $token = $tokenResult->token;
                /*if ($request->remember_me){
                    $token->expires_at = Carbon::now()->addWeeks(1);
                }*/
                    
                $token->save();

                
                return response()->json([
                    'token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'status'=>200
                    ],200);
 
        
      } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
    } 
     

    }


    public function login(LoginRequest $request){
        try {
            $credentials = request(['email', 'password']);

          if(Auth::attempt($credentials)) {
                $user = $request->user();
                $tokenResult = $user->createToken('ikozy');
                $token = $tokenResult->token;
                /*if ($request->remember_me){
                    $token->expires_at = Carbon::now()->addWeeks(1);
                }*/
                    
                $token->save();
                
                $address=$this->getUserAddress();
                
                return response()->json([
                    'token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'company_name'=>isset($address['company_name'])?$address['company_name']:'',
                    'full_address'=>isset($address['full_address'])?$address['full_address']:'',
					'status'=>200
                    
                    ],200);


          }else{
            return response()->json(['success' =>0,'error' => 'UnAuthorised','status'=>401], 401);
          }
        } catch (\Exception $e) {
            return response()->json(['success' =>0, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
           
           
    }  


    public function logout(Request $request){
       try {
		
        $request->user()->token()->revoke();
        return response()->json(['success'=>1,
            'message' => 'Successfully logged out',
			'status'=>200
        ],200);
       } catch (\Exception $e) {
        return response()->json(['success' =>0, 'error' =>$e->getMessage(),'status'=>500 ],500);
       }
       

        /*$accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke(); */

    }

    public function getUserAddress(){
       
        $user_profile=UserProfile::where('user_id',$this->user_id())->first();
       
       $city = City::getName($user_profile->city);
       $state = State::getName($user_profile->state);
       $country = Country::getName($user_profile->country);
        $full_address='';
        if(!empty($user_profile->address)){
            $full_address .= $user_profile->address.', ';
        }
        if(!empty($city)){
            $full_address .= $city.', ';
        }
          if(!empty($state)){
            $full_address .= $state.', ';
        }
          if(!empty($country)){
            $full_address .= $country;
        }

          return $user = [
            'company_name'=>$user_profile->company_name,
            'full_address'=>$full_address,
             
        ];
      
        
     

    }    

    public function getUserProfile(Request $request){
          try { 
        $user_data = $request->user();


        $user_profile=UserProfile::where('user_id',$this->user_id())->first();
       
       $city = City::getName($user_profile->city);
       $state = State::getName($user_profile->state);
       $country = Country::getName($user_profile->country);
        $full_address='';
        if(!empty($user_profile->address)){
            $full_address .= $user_profile->address.', ';
        }
        if(!empty($city)){
            $full_address .= $city.', ';
        }
          if(!empty($state)){
            $full_address .= $state.', ';
        }
          if(!empty($country)){
            $full_address .= $country;
        }


   
        $user = [
            'name'=>$user_data->name,
            'first_name'=>$user_profile->first_name,
            'last_name'=>$user_profile->last_name,
            'email'=>$user_data->email,
            'company_name'=>$user_profile->company_name,
            'telephone'=>$user_profile->telephone,
            'bussiness_description'=>$user_profile->bussiness_description,
            'bussiness_type'=>isset($user_profile->bussiness_type)?explode('-',$user_profile->bussiness_type):NULL,
            'country'=>$user_profile->country,
            'state'=>$user_profile->state,
            'city'=>$user_profile->city,
            'zipcode'=>$user_profile->zipcode,
            'address'=>$user_profile->address,
            'full_address'=>$full_address,
             
        ];
      
         return response()->json($user,200);


        }catch (\Exception $e) {
        return response()->json(['success' =>0, 'error' =>$e->getMessage(),'status'=>500 ],500);
       }

       
    }



    public function updateUserProfile(Request $request){
       
      
        try{
       
            $update_user = [
                'name'=>$request->first_name.' '.$request->last_name,
            ];

             $user_update=User::where('id',$this->user_id())->update($update_user);
            
     

                    $city = City::getName($request->city);
       $state = State::getName($request->state);
       $country = Country::getName($request->country);
        $full_address='';
        if(!empty($request->address)){
            $full_address .= $request->address.', ';
        }
        if(!empty($city)){
            $full_address .= $city.', ';
        }
          if(!empty($state)){
            $full_address .= $state.', ';
        }
          if(!empty($country)){
            $full_address .= $country;
        } 

        $user = [
            'company_name'=>$request->company_name,
            'full_address'=>$full_address,
             
        ];
            $user_profile= [
            'user_id'=>$this->user_id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'telephone' => $request->phone,
            'company_name'=>$request->company_name,
            
            'bussiness_description'=>isset($request->bussiness_description)?$request->bussiness_description:NULL,
             'bussiness_type'=>isset($request->bussiness_type)?implode('-',$request->bussiness_type):NULL,
            'country'=>isset($request->country)?$request->country:NULL,
            'state'=>isset($request->state)?$request->state:NULL,
            'city'=>isset($request->city)?$request->city:NULL,
            //'zipcode'=>$request->zipcode,
            'address'=>$request->address,
            
           
        ];




             $output= UserProfile::where('user_id',$this->user_id())->update($user_profile);
      
          if($output==1){
                 return response()->json(['success' =>true, 'msg' =>'your profile has been successfully updated','status'=>200,'data'=>$user ],200);
            }else{
                 return response()->json(['success' =>false, 'msg' =>'Opps something went wrong', 'status'=>200 ],200);
            }

       }catch (\Exception $e) {
        return response()->json(['success' =>0, 'error' =>$e->getMessage(),'status'=>500 ],500);
       }
        
    }
    
  
    public function passwordRequest(Request $request){
        
        try {


             $user = User::where('email', $request->email)->first();
             if(!empty($user)){
                $passwordReset = PasswordReset::updateOrCreate(
                    ['email' => $user->email],
                    [
                        'email' => $user->email,
                        'token' => str_random(60)
                     ]
                );

                if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );
                return response()->json([
                    'success'=>true,
                    'status'=>200,
                    'message' => 'We have e-mailed your password reset link!'
                ],200);

             }else{
                return response()->json([
                    'success'=>false,
                    'status'=>404,
                     'message' => "We can't find a user with that e-mail address."
                ], 404);
             }
          
        } catch (Exception $e) {
            return response()->json(['success' =>0, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

    }

    public function password_check(Request $request){
        try {
            $passwordReset = PasswordReset::where('token', $token)->first();
           if (!$passwordReset)
            return response()->json([
                'success'=>false,
                    'status'=>404,
                'message' => 'This password reset token is invalid.'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'success'=>false,
                    'status'=>404,
                'message' => 'This password reset token is invalid.'
            ], 404);
        }
        return response()->json($passwordReset);
            
            
        } catch (Exception $e) {
            return response()->json(['success' =>0, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
    }

    public function resetPassword(\App\Http\Requests\Api\resetFormRequest $request){
        try {

             $passwordReset = PasswordReset::where('email',$request->email)->where('token',$request->token)->first();

            if (!$passwordReset){
                return response()->json([
                'success'=>false,
                    'status'=>404,    
                'message' => 'This password reset token is invalid.'
                ], 200);    
            }

             if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
                    PasswordReset::where('email',$request->email)->where('token',$request->token)->delete();
            
                    return response()->json([
                        'success'=>false,
                            'status'=>404,
                        'message' => 'This password reset token is invalid.'
                    ], 200); 

            }
           
            $user = User::where('email', $passwordReset->email)->first();
           
        if (!$user){
                return response()->json([
                'message' => "We can't find a user with that e-mail address."
            ], 200);
        }

     
        $pass_update=User::where('email', $passwordReset->email)->update(['password'=>bcrypt($request->password)]);
        if($pass_update==1){
            PasswordReset::where('email',$request->email)->where('token',$request->token)->delete();
            $user->notify(new PasswordResetSuccess($passwordReset));
            $data_success=[
                'user'=>$user,
                'message' => "Your password has been changed successfully! Thank you.",
                 'success'=>true,
                 'status'=>200,
            ];
            return response()->json($data_success,200);

        }
      
        } catch (Exception $e) {
            return response()->json(['success' =>0, 'error' =>$e->getMessage(),'status'=>500 ],500);   
        }
        

    }

    public function changePassword(passwordRequest $request){
        try {
                
                $password = Hash::make($request->password);
                $output=User::where('id',$this->user_id())->update(['password'=>$password]);
                if($output==1){
                      $data_success=[
                        'message' => "Your password has been changed successfully! Thank you.",
                        'success'=>true,
                        'status'=>200,
                     ];
                    return response()->json($data_success,200);

                }
             
        } catch (Exception $e) {
            return response()->json(['success' =>0, 'error' =>$e->getMessage(),'status'=>500 ],500);   
            
        }
    
    }    


    public function user_id(){
       
        return Auth::user()->id;
    }

    
    public function notValid(){

        return response()->json(['success' =>0, 'error' =>'not valid api request','status'=>500 ],500);
    }
 
  

}