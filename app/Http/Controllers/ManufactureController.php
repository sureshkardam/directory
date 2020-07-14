<?php

namespace App\Http\Controllers;

//use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\Manufacture;
use App\Model\Admin\Product;



class ManufactureController extends Controller
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
  

    public function showManufacturer()
    {
            $data['manufactures']=Manufacture::all();
         return view('admin.manufacture',$data);    

    }

    public function createManufacturer(Request $request){
	       
		$validatedData = $request->validate([
                'name' => 'required'
                
               
         
                   ]);

         if( $request->hasFile('image')){ 
                    $image = $request->file('image'); 


                    $image_path=$this->image_upload($image);
                                
                   
                   
      
                }
	
        $data=$request->except('_token','image','submit');

        $data['image']=$image_path;
         $output= Manufacture::create($data);
         if($output->id){
            return redirect()->back()->with('message', 'Successfully Updated!');

         }else{
            return redirect()->back()->with('error', 'Opps! something went wrong');
         }
    }

     
	
	public function editManufacturer(Request $request,$id){
		
		 $manufacture = Manufacture::find($id);
	      $validatedData = $request->validate([
		  'name' => 'required|max:255',
          
				
                   ]);

           if( $request->hasFile('image')){ 
                    $image = $request->file('image'); 


                    $image_path=$this->image_upload($image);
                                
                   
                   
      
                }else{

                    $image_path = $manufacture->image;

                }
               
				   
		
         $id = $request->input('id');
         $name = $request->input('name');
         $sort = $request->input('sort_order');
         $status = $request->input('status');

        
         $manufacture->name= $name;
         $manufacture->image= $image_path;
         $manufacture->sort_order=$sort;
         $manufacture->status=$status;
   
         $manufacture->save();
               
    

       return redirect()->back()->with('message', 'Successfully Updated!');
     

    }

public function image_upload($image){
       $name = time().'.'.$image->getClientOriginalExtension(); //get the  file extention
     

       $destinationPath = public_path('/manufacture-image'); //public path folder dir
       $sucess=$image->move($destinationPath, $name);  //mve to destination you mentioned 
      if ($sucess) {
            return 'manufacture-image/'.$name;
        }

        return NULL;

    }
	
	
public  function deleteManufacturer($id){

        $find = Product::where('manufacturer_id',$id)->get();


          if($find->count() > 0)
           {
             return redirect()->back()->with('error', 'This Manufacturer is associated with the Products. Not able to delete!');
        }
        else
        {

           Manufacture::where('id',$id)->delete();
            return redirect()->back()->with('message', 'Successfully Deleted!');
        }
          

            }    




}
