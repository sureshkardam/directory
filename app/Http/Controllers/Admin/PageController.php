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
use App\Model\Admin\Information;
use App\User;





class PageController extends Controller
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
  

    public function getPage($seo_url){

    $page=Information::Where('seo_url',$seo_url)->first();


    return view('admin.pages',compact('page'));

   }

 


  public function editUser(Request $request,$id){

                 $validatedData = $request->validate([
              'name' => 'required',
              'email' => 'required',
              

               
                ]);


         $user = User::findorfail($id);


     if ($request->isMethod('get')) {

          return view('admin.user',compact('user'));

       
     }else{

    
         $id = $request->input('id');
         $name = $request->input('name');
         $email = $request->input('email');
        
         $status = $request->input('status');

         $User = User::find($id);
         $User->name= $name;
         $User->email=$email;
      
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

                 $validatedData = $request->validate([
              'name' => 'required',
              'email' => 'required',
              'password' => 'required',

               
                ]);

    if ($request->isMethod('get')) {
      
    
         
             return view('admin.user');

       
       

              }
      
      else{

          
 $name = $request->input('name');
        $email = $request->input('email');
     $password = $request->input('password');
        $status = $request->input('status');
        // $Cname = $request->input('company_name');
        
            
           
        $data=array('name'=>$name,
                    'email'=>$email,
                    'password'=>$password,
                    'status'=>$status,
                          // 'company_name'=>$Cname,
                          
                        ); 

              User::create($data);
              return redirect()->route('admin.user')->with('message', 'Successfully Created!');
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
