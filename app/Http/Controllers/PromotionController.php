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
use App\Model\Admin\Filter;
use App\Model\Admin\FilterGroup;
use App\Model\Admin\Promotion;
use App\Model\Admin\PromotionName;
use App\Model\Admin\Category;
use App\Model\Admin\PromotionToCategory;
use App\Model\Admin\UserGroup;
use App\Model\Admin\CustomerGroup;
use Illuminate\Support\Arr;

class PromotionController extends Controller
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
  

    public function showPromotion()
    {
         
     
        //$promotion_name = PromotionName::where('status', '=', 1)->get();
        $promotion_name = PromotionName::all();
        //$promotion = Promotion::where('status', '=', 1)->get();
        $promotion = Promotion::all();
         return view('admin.promotion', compact('promotion'));

    }

    
     public function editPromotion(Request $request,$id){
	  
	        //$promotion_name = PromotionName::where('status', '=', 1)->get();
          $promotion_name = PromotionName::all();
          //$group = CustomerGroup::where('status', '=', 1)->get();
          $group = CustomerGroup::all();
          $promotion = Promotion::findorfail($id);
          $categories=Category::getCategory();
          $promoCat=PromotionToCategory::where('promotion_id','=',$id)->get();
      //       foreach ($promoCat as $key => $promoCat) {
      // $data['promoCat'][]=$promoCat->promotion_id;
      // }



            $mid = json_decode(json_encode($promoCat), true);
             

            $PromotionToCategory = Arr::pluck($mid, 'category_id');

            // echo "<pre>";
            // print_r($mid);
            // exit();

       if ($request->isMethod('get')) {
       


         return view('admin.edit_promotion',compact('promotion','promotion_name','categories','PromotionToCategory','group'));

       
    }

   else{

    



                 $validatedData = $request->validate([
                'promotion_code' => 'required',
                'promotion_conditions' => 'required',
                'promotion_amount' => 'required',
                'min_spend_amount' => 'required',
                'max_spend_amount' => 'required',
                  'category' => 'required',
                   // 'sub_category' => 'required',
                   'select_user_role' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',

             
         
                   ]);

         
        $code = $request->input('promotion_code');
        $condition = $request->input('promotion_conditions');
        $amount = $request->input('promotion_amount');
        $min_amount = $request->input('min_spend_amount');
        $max_amount = $request->input('max_spend_amount');
       $category = $request->input('category');
        // $sCategory = $request->input('sub_category');
        $UserRole = $request->input('select_user_role');
        $sDate = $request->input('start_date');
        $eDate = $request->input('end_date');    
        $status = $request->input('status');
			
			
		 $startDate = strtotime($sDate);
			 $endDate = strtotime($eDate);

      $max = $max_amount;
      $min = $min_amount;

       if ($min > $max ) {
        return redirect()->back()->with('error', 'Min Spend Amount less than Max Spend Amount ');
       }
       
			 
			 if ($startDate > $endDate)
			 {
				return redirect()->back()->with('error', 'Start Date Should less than End Date.');	 
			 }	
			
			
			
        
         $promotion->promotion_code=  $code;
         $promotion->promotion_conditions=  $condition;
         $promotion->promotion_amount=  $amount;
         $promotion->min_spend_amount=  $min_amount;
         $promotion->max_spend_amount=  $max_amount;
         // $promotion->category=  $category;
         // $promotion->sub_category=  $sCategory;
         $promotion->select_user_role=  $UserRole;
         $promotion->start_date=  $sDate;
         $promotion->end_date=  $eDate;
         $promotion->status=  $status;
         
         $promotion->save();
         PromotionToCategory::where('promotion_id','=',$promotion->id)->delete();



         foreach($category as $category)
                {
                  $productCategory = PromotionToCategory::create(array(
                    'promotion_id' => $promotion->id,
                    'category_id' => $category
                   
                ));

}

                      //$promo=Promotion::edit($data);

                
    

       return redirect()->route('admin.promotion')->with('message', 'Successfully Updated!');

   }
     

    
  }

    


    public function createPromotion(Request $request){
	
	       
          $categories=Category::getCategory();
                
                  //$group = CustomerGroup::where('status','=',1)->get();
                   $group = CustomerGroup::all();  
                //$promotion_name = PromotionName::where('status', '=', 1)->get(); 
                 $promotion_name = PromotionName::all();

           if ($request->isMethod('get')) {
         
                
                 return view('admin.create_promotion', compact('promotion_name','categories','group'));

              }
              else
                  

                  
                

                {    

               // echo "<pre>";
               // print_r($request->all());
               // exit();


            $validatedData = $request->validate([
                'promotion_code' => 'required',
                'promotion_conditions' => 'required',
                'promotion_amount' => 'required',
                'min_spend_amount' => 'required',
                'max_spend_amount' => 'required',
                'category_id' => 'required',
               
                'select_user_role' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',

             
         
                   ]);



            $code = $request->input('promotion_code');
            $condition = $request->input('promotion_conditions');
            $amount = $request->input('promotion_amount');
            $min_amount = $request->input('min_spend_amount');
            $max_amount = $request->input('max_spend_amount');
            $categories = $request->input('category_id');
            // $sCategory = $request->input('sub_category');
            $UserRole = $request->input('select_user_role');
            $sDate = $request->input('start_date');
            $eDate = $request->input('end_date');
            $status = $request->input('status');

             
			 $startDate = strtotime($sDate);
			 $endDate = strtotime($eDate);

        $max = $max_amount;
      $min = $min_amount;
			 
			 if ($startDate > $endDate)
			 {
				return redirect()->back()->with('error', 'Start Date Should less than End Date.');	 
			 }


       if ($min > $max ) {
        return redirect()->back()->with('error', 'Min Spend Amount less than Max Spend Amount ');
       }
			 
			
			 $find=Promotion::where('promotion_code','=',$code)->first();
			 
			 if($find)
		{
		
		return redirect()->back()->with('error', 'Promotion Code Already exists!');	
			
		}else{
			 
			 
			 $data=array(
			 
			 'user_id' => '1',
			 'promotion_code'=>$code,
                         'promotion_conditions'=>$condition,
                          'promotion_amount'=>$amount,
                          'min_spend_amount'=>$min_amount,
                          'max_spend_amount'=>$max_amount,
                          // 'category_id'=>$categories,
                          // 'sub_category'=>$sCategory,
                          'select_user_role'=>$UserRole,
                          'start_date'=>$sDate,
                          'end_date'=>$eDate,
                          'status'=>$status );  

              $promo=Promotion::create($data);

               

                foreach($categories as $category)
                {
                  $productCategory = PromotionToCategory::create(array(
                    'promotion_id' => $promo->id,
                    'category_id' => $category
                   
                ));

}
          



              return redirect()->route('admin.promotion')->with('message', 'Successfully Created!');

              
		}
			  
			  }
			   
}



              



      public  function deletePromotion($id){

           Promotion::where('id',$id)->delete();
           return redirect()->back()->with('message', 'Successfully Deleted!');
                


            }    


                

}
