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
use App\Model\Admin\UserProfile;
use App\Model\Admin\UserAddress;
use App\Model\Admin\BusinessType;
use App\Model\Admin\Information;


class InformationController extends Controller
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
  

    public function showInformation()
    {
         
      //return view('admin.businesstype');
        // $attribute = Attribute::where('status', '=', 1)->get();
        //  return view('admin.attribute', compact('attribute','attribute_group'));

       // $businesstype=BusinessType::where('status','=',1)->get();

         //$information=Information::where('status','=',1)->get();
         $information=Information::all();

         return view('admin.information_list',compact('information'));



    }



public function editInformation(Request $request,$id){


        
        


         $information = Information::findorfail($id);

     if ($request->isMethod('get')) {
         
                 return view('admin.edit_information',compact('information'));

              }


              else{


                 $validatedData = $request->validate([
             'title' => 'required',
             'seo_url' => 'required|alpha-dash',
             'meta_title' => 'required',
             'meta_description' => 'required',
             'description' => 'required',

                //  // 'sort_order' => 'required|numeric|',
                  ]);


         
         $title = $request->input('title');
         $seo_url = $request->input('seo_url');
         $meta_title = $request->input('meta_title');
         $meta_description = $request->input('meta_description');
         $description = $request->input('description');
         $status = $request->input('status');

         
         $information->title=$title;
         $information->seo_url= strtolower($seo_url);
         $information->meta_title=$meta_title;
         $information->meta_description=$meta_description;
         $information->description=$description;
         $information->status=$status;
   
         $information->save();
    

       return redirect()->route('admin.information')->with('message', 'Successfully Updated!');
     }

    }


    public function createInformation(Request $request){


          if ($request->isMethod('get')) {
         
                 return view('admin.create_information');

              }
              else{


              $validatedData = $request->validate([
             'title' => 'required',
             'seo_url' => 'required|unique:information|alpha-dash',
             'meta_title' => 'required',
             'meta_description' => 'required',
             'description' => 'required',

                //  // 'sort_order' => 'required|numeric|',
                  ]);



             $title = $request->input('title');
            $description = $request->input('description');
            $meta_title = $request->input('meta_title');
            $meta_description = $request->input('meta_description');
            $seo_url = $request->input('seo_url');
                     
            $status = $request->input('status');
             $data=array('title'=>$title,
                         'description'=>$description,
                          'meta_title'=>$meta_title,
                          'meta_description'=>$meta_description,
                          'seo_url'=>strtolower($seo_url),
                         
                          'status'=>$status); 

             Information::create($data);
              return redirect()->route('admin.information')->with('message', 'Successfully Created!');
          }

}


public  function deleteInformation($id){

           Information::where('id',$id)->delete();
           return redirect()->route('admin.information')->with('message', 'Successfully Deleted!');
                


            } 








}