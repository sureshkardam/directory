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
use App\Model\Admin\Option;
use App\Model\Admin\OptionValue;
use App\Model\Admin\Product;





class AjaxController extends Controller
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
  

   public function selectState(Request $request) {
       
	    $country_id = $request->get('country_id');
		$states=State::where('country_id','=', $country_id)->get();
        
		if($states)
           return $states;
    
        else
            return ['value'=>'No Match Found','key'=>''];
    }
	
	
	public function selectCity(Request $request) {
       
	    $state_id = $request->get('state_id');
		$city=City::where('state_id','=', $state_id)->get();
        
		if($city)
           return $city;
    
        else
            return ['value'=>'No Match Found','key'=>''];
    }
	
	public function selectOptionList(Request $request) {
       
	    $option_id = $request->get('option_id');
		$optionValue=OptionValue::where('option_id','=', $option_id)->get();
        
		if($optionValue)
           return $optionValue;
    
        else
            return ['value'=>'No Match Found','key'=>''];
    }

   public function ajaxUpdateMenuStatus(Request $request) 
	{
		$id = $request->get('id');
       	$status = $request->get('status');
		$data=array();
		$product = Product::where('id', '=', $id)->first();
		
		$product->is_admin_approved=$status;
		$product->save();
		$data[]=array('success'=>'1','msg'=>'Product Approval Status Changed!');
		return $data;
	}      

   public function ajaxUpdateFeature(Request $request) 
  {
    $id = $request->get('id');
    $status = $request->get('status');
    $data=array();
    $product = Product::where('id', '=', $id)->first();
    
    $product->featured=$status;
    $product->save();
    $data[]=array('success'=>'1','msg'=>'Product Approval Status Changed!');
    return $data;
  }          

   public function ajaxBulkUpdate(Request $request) 
  {
    
$result=array();
$records=$request->input('data');
$status=$request->input('status');
$records =explode(',',$records);

// echo"<pre>";
// print_r($records);
// exit;


foreach($records as $record)

{

$find=Product::find($record);

$find->stock_status_id=$status;
$find->save();


}


$data[]=array('success'=>'1','msg'=>'Bulk Status Updated');
return $data;
}        



}
