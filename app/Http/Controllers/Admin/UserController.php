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
use App\Model\Admin\CustomerGroup;
use App\User;
use Hash;




class UserController extends Controller
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
  

    public function showUser()
    {
         $user = User::where('user_type','=',2)->get();
         
        $customer_group = CustomerGroup::where('status','=',1)->get();
         

         return view('admin.user', compact('user','customer_group'));


    }

 


//     
    public function editUser(Request $request,$id){

                 $validatedData = $request->validate([
              'name' => 'required',
            
              

               
                ]);


         $user = User::findorfail($id);


     if ($request->isMethod('get')) {

          return view('admin.user',compact('user'));

       
     }else{



    
         $id = $request->input('id');
         $name = $request->input('name');
         $customer_group = $request->input('group_id');
        
         $status = $request->input('status');

         $User = User::find($id);
         $User->name= $name;
         $User->group_id=$customer_group;
      
         $User->status=$status;
   
         $User->save();
    

       return redirect()->back()->with('message', 'Successfully Updated!');
     

    }
    

}

 public function editpassword(Request $request,$id){

  $validatedData = $request->validate([
                            'password' => 'required',
             
               
                ]);


         $user = User::findorfail($id);


     if ($request->isMethod('get')) {

          return view('admin.user',compact('user'));

       
     }else{

    
        
         $password= $request->input('password');
         $status = $request->input('status');

         $User = User::find($id);
        
         $User->password=$password;
         $User->status=$status;
   
         $User->save();
    

       return redirect()->back()->with('message', 'Password Successfully Changed!');
     

    }
    

}

    


    public function createUser(Request $request){
        $customer_group = CustomerGroup::all();
                 $validatedData = $request->validate([
              'name' => 'required',
              'email' => 'required',
              'password' => 'required',

               
                ]);

                

    if ($request->isMethod('get')) {
      
    
         
             return view('admin.user');

       
       

              }

              
       
      else{    

        // echo "<pre>";
        // print_r($request->all());
        // exit;
                    
          
 $name = $request->input('name');
 $customer_group = $request->input('group_id');
        $email = $request->input('email');
     $password = $request->input('password');

        $status = $request->input('status');
        

         $find = User::where('user_type','=',2)
                    ->where('email','=',$email)
                        ->first();

          if($find)
        {

            return redirect()->back()->with('error', 'Customer Already Exists!');
        }else
        {
              
        
            
           
        $data=array('name'=>$name,
                   'group_id'=>$customer_group, 
                    'email'=>$email,
                    'password'=> Hash::make($password),
                    'password'=> Hash::make($password),
                    'status'=>$status,
                    'user_type'=>2,
                          // 'company_name'=>$Cname,
                          
                        ); 
            


              User::create($data);



              return redirect()->route('admin.user')->with('message', 'Successfully Created!');
          }

      }



}







        // public function getStateList(Request $request)
        // {
        //     $states = DB::table("states")
        //     ->where("country_id",$request->country_id)
        //     ->pluck("name","id");
        //     return response()->json($states);

            
        // }

        // public function getCityList(Request $request)
        // {
        //     $cities = DB::table("cities")
        //     ->where("state_id",$request->state_id)
        //     ->pluck("name","id");
        //     return response()->json($cities);
        // }

 





     public  function deleteUser($id){




           User::where('id',$id)->delete();
           return redirect()->back()->with('message', 'Successfully Deleted!');
                


            }    


                

}
