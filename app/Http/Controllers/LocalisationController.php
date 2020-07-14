<?php

namespace App\Http\Controllers;

//use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;



class LocalisationController extends Controller
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
  
	//country
    public function showCountries()
    {

        $countries = Country::all();
        return view('admin.showCountries', compact('countries'));
    }
	
	
	
	public function createCountry(Request $request){

                $validatedData = $request->validate([
                'name' => 'required',
                'code' => 'required',
                'phonecode' => 'required|numeric|',
                   ]);



             $countryName = $request->input('name');
             $countryCode = $request->input('code');
             $phonecode = $request->input('phonecode');
             $status = $request->input('status');
             $data=array('name'=>$countryName,"code"=>$countryCode,"phonecode"=>$phonecode,"status"=>$status);
             Country::create($data);
                return redirect()->back()->with('message', 'Successfully Created!');
      }
	
	public function editCountry(Request $request){
	
	     $validatedData = $request->validate([
                'country_name' => 'required|max:255',
				'country_code' => 'required|max:255',
                'phone_code' => 'required',
				
                   ]);
	
         $id = $request->input('id');
         $country_name = $request->input('country_name');
         $country_code = $request->input('country_code');
         $phone_code = $request->input('phone_code');
         $status = $request->input('status');

         $country = Country::find($id);
         $country->name= $country_name;
         $country->code=$country_code;
         $country->phonecode=$phone_code;
         $country->status=$status;
   
         $country->save();
    

       return redirect()->back()->with('message', 'Successfully Updated!');


    }
	
	
	public function deleteCountry($id){
             $data = Country::findOrFail($id);
             $data->delete();

        //return redirect('/country/list')->with('success', 'Successfully deleted');
		
		return redirect()->back()->with('message', 'Successfully deleted');
		
    }
	
	
	
	// state list
	
	 public function showState(Request $request)
    {

       $countries = Country::all();
		
		 if ($request->isMethod('post')) { 
		
			
			$key = $request->input('keyword');
			$states = State::Search($key)->Status()->paginate(20);
			
			return view('admin.showStates', compact('states','countries'));
			
		
		 }else
			 
		 
		 {
		$states = State::paginate(20);
        //$states = State::where('status', '=', 1)->paginate(20);


		
        return view('admin.showStates', compact('states','countries'));
		 
		 
		 }
    }
	
	
	public function createState(Request $request){

                $validatedData = $request->validate([
                'name' => 'required|max:255',
                'country_id' => 'required',
                'status' => 'required',
                   ]);



             $name = $request->input('name');
             $country_id = $request->input('country_id');
             $status = $request->input('status');
             $data=array('name'=>$name,"country_id"=>$country_id,"status"=>$status);
             State::create($data);
                return redirect()->back()->with('message', 'Successfully Created!');
      }
	
	public function editState(Request $request){
	
	     $validatedData = $request->validate([
               'name' => 'required|max:255',
                'country_id' => 'required',
                'status' => 'required',
				
                   ]);
	
         $id = $request->input('id');
         $name = $request->input('name');
         $country_id = $request->input('country_id');
         $status = $request->input('status');

         $state = State::find($id);
         $state->name= $name;
         $state->country_id=$country_id;
         $state->status=$status;
   
         $state->save();
    

       return redirect()->back()->with('message', 'Successfully Updated!');


    }
	
	
	public function deleteState($id){
             $data = State::findOrFail($id);
             $data->delete();

        return redirect()->back()->with('message', 'Successfully deleted');
    }
	
//city list
	 public function showCity(Request $request)
    {
        
		$states = State::all();
		 if ($request->isMethod('post')) { 
		
		
		
			$key = $request->input('keyword');
			$cities = City::Search($key)->Status()->paginate(20);
			
			return view('admin.showCities', compact('cities','states'));
		
		 }else
			 
		 
		 {
		 
		$cities = City::paginate(20);
        return view('admin.showCities', compact('cities','states'));
		 
		 
		 }
		
		
		
		
    }

    public function createCity(Request $request){

                $validatedData = $request->validate([
                'name' => 'required|max:255',
                'state_id' => 'required',
                'status' => 'required',
                   ]);



             $name = $request->input('name');
             $state_id = $request->input('state_id');
             $status = $request->input('status');
             $data=array('name'=>$name,"state_id"=>$state_id,"status"=>$status);
             City::create($data);
                return redirect()->back()->with('message', 'Successfully Created!');
      }
	
	public function editCity(Request $request){
	
	     $validatedData = $request->validate([
              'name' => 'required|max:255',
                'state_id' => 'required',
                'status' => 'required',
				
                   ]);
	
        $id = $request->input('id');
        $name = $request->input('name');
        $state_id = $request->input('state_id');
        $status = $request->input('status');

         $city = City::find($id);
         $city->name= $name;
         $city->state_id=$state_id;
         $city->status=$status;
   
         $city->save();
    

       return redirect()->back()->with('message', 'Successfully Updated!');


    }
	
	
	public function deleteCity($id){
             $data = City::findOrFail($id);
             $data->delete();

        return redirect()->back()->with('message', 'Successfully deleted');
    }
        
            
 


    
}



    



