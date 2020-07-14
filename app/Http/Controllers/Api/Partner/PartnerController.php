<?php

namespace App\Http\Controllers\Api\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Model\Admin\Product;
use App\Model\Admin\Manufacture;
use App\Model\Admin\Category;
use App\Model\Admin\ProductToCategory;
use App\Model\Admin\ProductImage;
use App\Model\Admin\ProductOption;
use App\Model\Admin\CustomerGroup;
use App\Model\Admin\Promotion;
use App\Model\Admin\OptionValue;
use App\Model\Admin\Option;
use App\Model\Admin\Attribute;
use App\Model\Admin\PromotionToCategory;
use App\Model\Admin\ProductOptionValue;
use App\Model\Admin\ProductAttribute;
use App\Model\Admin\SupportCategory;
use App\Model\Admin\Support;
use App\Model\Admin\SupportComment;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\ShippingRule;
use App\Model\Admin\BusinessType;
use Helper;


class PartnerController extends Controller
{
  
   
    public function user_id(){
       
        return Auth::user()->id;
    }

    private function getCountryName($id){
        $country=Country::where('id',$id)->first()->name;
        if($country){
            return $country;
        }

        return false;
       
    }

    private function getStateName($id){
         $state=State::where('id',$id)->first()->name;
        if($state){
            return $state;
        }

        return false;
    }


    public function get_business_type(){
            $datas=BusinessType::where('status',1)->get();
            $result=[];
            foreach ($datas as $key => $value) {
                $result[]=[
                     'id'=>$value->id,
                    'name'=>$value->name
                ];
                
            }

            return response()->json($result,200);
    }

    public function getCountry(){
        $country=Country::all();
       $data=[];
        foreach ($country as $key => $value) {
            $data[]=[
                'id'=>$value->id,
                'name'=>$value->name
            ];
        }

          return response()->json($data,200);
    }

    public function getState($id){
        $states=State::where('country_id',$id)->get();
        $data=[];
        foreach ($states as $key => $value) {
            $data[]=[
                'id'=>$value->id,
                'name'=>$value->name,
                'country_id'=>$value->country_id
            ];
        }

         return response()->json($data,200);

    }

     public function getCity($id){
        $states=City::where('state_id',$id)->get();
            $data=[];
        foreach ($states as $key => $value) {
            $data[]=[
                'id'=>$value->id,
                'name'=>$value->name,
                'state_id'=>$value->state_id
            ];
        }

         return response()->json($data,200);

    }

    public function category_manufacture(){
    	try {
    		//print_r(Auth::user());
    		
    		$manufactures=Manufacture::all();
    		$categories=Category::getCategory();
            //$attributes=Attribute::where('status',1)->get();

    		 return response()->json([
    		 		'categories'=>$categories,
                    'manufactures'=>$manufactures,
                   
                    'status'=>200
                    ],200);

    	} catch (Exception $e) {
    		 return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
    	}
    	
    }

    public function get_attributes(){
        try {
        $attributes=Attribute::where('status',1)->get();

          return response()->json($attributes,200);

        } catch (Exception $e) {
             return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
    }

    public function get_category(Request $request){
        try {
            $categories=Category::getCategory();
             return response()->json([
                    'categories'=>$categories,
                    'status'=>200
                    ],200);

        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

    }

    public function get_customer_group(){
        
        try {
            $CustomerGroup=CustomerGroup::all();
             return response()->json($CustomerGroup,200);
            
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

    }

    public function insertPromotionData($request){

       return $data_insert=[
                     'user_id'=>$this->user_id(),
                    'promotion_code'=>$request->promotion_code,
                     'promotion_conditions'=>$request->promotion_conditions,
                      'promotion_amount'=>$request->promotion_amount,
                       'min_spend_amount'=>$request->min_spend_amount,
                        'max_spend_amount'=>$request->max_spend_amount,
                         'select_user_role'=>$request->select_user_role,
                         'start_date'=>$request->start_date,
                         'end_date'=>$request->end_date,
                          'status'=>$request->status,
            ];

    }

    public function createPromotionToCategory($promotion_id,$category){
         return $promotion = [
                            'promotion_id'=>$promotion_id,
                            'category_id'=>$category

                        ];

    }

    public function CreatePromotion(Request $request){
        try {

                $exitsPromotion=Promotion::where(DB::raw('BINARY `promotion_code`'),$request->promotion_code)->where('user_id',$this->user_id())->count();
            
                if($exitsPromotion==0){
                            $data_insert=$this->insertPromotionData($request);

            $output=Promotion::create($data_insert);
            if($output->id){
                if(!empty($request->category)){

                    foreach ($request->category as $key => $category) {
                      
                            $promotion=$this->createPromotionToCategory($output->id,$category);
                        $output_promotion=PromotionToCategory::create($promotion);
                    }
                    

                }
               
                
                return response()->json(['success' =>true, 'msg' =>'Sucessfully Create Promotion','status'=>200 ],200);
            }
                }else{

                    return response()->json(['success' =>false, 'msg' =>'Promotion code should be unique','status'=>422 ],422);

                }

            
            
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
    }

    public function editPromotion(Request $request,$id){
        try {
            $promotion=Promotion::find($id)->toArray();
             if ($request->isMethod('post')) {

                         $exitsPromotion=Promotion::where(DB::raw('BINARY `promotion_code`'),$request->promotion_code)->where('user_id',$this->user_id())->where('id','!=',$id)->count();  

                         if($exitsPromotion==0){ 
                                     $data_update=$this->insertPromotionData($request);
                       

                        $update_output=Promotion::where('id',$id)->update($data_update);
                        if(!empty($request->category)){ 
                                $del_promotion=PromotionToCategory::where('promotion_id',$id)->delete();
                             foreach ($request->category as $key => $category) {
                      
                                    $promotion=$this->createPromotionToCategory($id,$category);
                                    $output_promotion=PromotionToCategory::create($promotion);
                            }

                        }
                return response()->json(['success' =>true, 'msg' =>'Sucessfully update Promotion','status'=>200 ],200);  

                         }else{
                                return response()->json(['success' =>false, 'msg' =>'Promotion code should be unique','status'=>422 ],422);
                         }
                             

               
             }else{
               
                
                $promotion_categry=PromotionToCategory::where('promotion_id',$promotion['id'])->pluck('category_id')->toArray();
                if(!empty($promotion_categry)){
                    $promotion_arry = ['promotion_categry'=>$promotion_categry];
                }else{
                    $promotion_arry = ['promotion_categry'=>''];
                }
                $merage_array=array_merge($promotion,$promotion_arry);
               
                
                 return response()->json($merage_array,200);
             }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

    }

    public function get_promotion(Request $request){
        try {
            $allPromotion=Promotion::where('user_id',$this->user_id())->get();
             return response()->json($allPromotion,200);

        } catch (Exception $e) {
             return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

    }

    public function delete_promotion(Request $request,$id){
        try{
            $promotion=Promotion::where('id',$id)->delete();
            $del_promotion=PromotionToCategory::where('promotion_id',$id)->delete();
               return response()->json(['success' =>true, 'msg' =>'Sucessfully delete Promotion','status'=>200 ],200);        


        } catch (Exception $e) {
             return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
    }

    public function get_option(){
        try {
            
            $data=[];
            $optionData=Option::all();
            
            foreach($optionData as $option)
            {
                
                
                //$data['option'][]=$option
                

                $optionValues=OptionValue::where('option_id',$option->id)->get();
              

               
                $data[]=array(
                    'id'=>$option->id,
                    'name'=>$option->name,
                    'type'=>$option->type,
                    'status'=>$option->status,
                    //'optionvalue'=>$optiondata,
                );
                //$data['option'][]=$optionData;
             }


              return response()->json($data,200);
            

        } catch (Exception $e) {
             return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

    }




public function get_edit_option(){
        try {
            
            $data=[];
            $optionData=Option::all();
            $optionValueData=OptionValue::all();
			
			
			
            $data['master_option']=$optionData;
			$data['master_option_value']=$optionValueData;


              return response()->json($data,200);
            

        } catch (Exception $e) {
             return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

    }


  public function OptionValueList(Request $request,$id) {
        
        try{
            $optionValue=OptionValue::where('option_id', $id)->get();
        
        if($optionValue){

            return response()->json($optionValue,200);
        }else{
            return ['value'=>'No Match Found','key'=>''];
        }
    

        } catch (Exception $e) {
             return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

            
    }  

	public function OptionValueListEdit(Request $request,$id) {
        
        try{
            $optionValue=OptionValue::where('option_id', $id)->get();
        
        if($optionValue){
			
			
			$data['master_option_value']=$optionValue;
            return response()->json($data,200);
			
        }else{
            return ['value'=>'No Match Found','key'=>''];
        }
    

        } catch (Exception $e) {
             return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

            
    }

    public function product_list(Request $request){
        try {
            //$allProducts=[];
            $products=Product::where('user_id',$this->user_id())->get()->toArray();
        
            if(!empty($products)){
                  foreach ($products as $key => $product) {
                    
                        $products_image=ProductImage::where('product_id',$product['id'])->first();
                 
                           $allProducts[]=[
                            'id'=>$product['id'],
                            'ikozy_id'=>$product['ikozy_id'],
                            'name'=>$product['name'],
                            'sku'=>$product['sku'],
                            'price'=>$product['price'],
                            'quantity'=>$product['quantity'],
                            'image'=>isset($products_image->image)?asset($products_image->image):asset('no-image.jpg'),
                            'status'=>$product['status'],
                            'admin_approve'=>$product['is_admin_approved'],

                        ];

               }

            }
          
            
             return response()->json($allProducts,200);
        } catch (Exception $e) {
              return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }

    }

       public function product_filter(Request $request){
       
                try {
                    $allProducts=[];
                     $status = $request->input('status');
            $approval = $request->input('approval');
            //$seller = $request->input('seller');
            $cat = $request->input('cat');
            $products = Product::User($this->user_id())->Status($status)->Approval($approval)->Category($cat)->get();
             foreach ($products as $key => $product) {
                $products_image=ProductImage::where('product_id',$product->id)->first();
                 
                   $allProducts[]=[
                    'id'=>$product->id,
                    'ikozy_id'=>$product->ikozy_id,
                    'name'=>$product->name,
                    'sku'=>$product->sku,
                    'price'=>$product->price,
                    'quantity'=>$product->quantity,
                    'image'=>isset($products_image->image)?asset($products_image->image):asset('no-image.jpg'),
                    'status'=>$product->status,
                    'admin_approve'=>$product->is_admin_approved,
                ];
            }
            
                    return response()->json($allProducts,200);
                } catch (Exception $e) {
                    return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
                }
           
    }

    public function CreateProduct(Request $request){
      
       
           $validatedData = $request->validate([
         'name' => 'required',
                  'meta_title' => 'required',
 'meta_description' => 'required',
 'sku' => 'required',
 'model' => 'required',
 'ikozy_id' => 'required',
 'quantity' => 'required',
 'manufacturer_id' => 'required',
 'price' => 'required',
 'discount_price' => 'required',
 'category_id' => 'required',
 'description' => 'required',
 'stock_status' => 'required',
 'status'=>'required'


                   ]);

        $attribute_data=[];
              try {
                // echo "<pre>";
                // print_r($request->all());
                // exit;
               
                $name=$request->input('name');
            $meta_title=$request->input('meta_title');
            $meta_description=$request->input('meta_description');
            $sku=$request->input('sku');
            $model=$request->input('model');
            $ikozy_id=$request->input('ikozy_id');
            $quantity=$request->input('quantity');
            $manufacturer_id=$request->input('manufacturer_id');
            $price=$request->input('price');
            $discount_price=$request->input('discount_price');
            
            $description=$request->input('description');
            $stock_status=$request->input('stock_status');
            $status=$request->input('status');
            $refund=$request->input('refund');
            $refund_policy_des=$request->input('refund_policy_des');
            $shipping=$request->input('shipping');
            $featured=$request->input('featured');
            
            // category id array
            $categories=explode(',', $request->input('category_id'));

            $product_data = [
                    'name' => $name,
                    'user_id' =>$this->user_id(),
                    'meta_title' => $meta_title,
                    'meta_description' => $meta_description,
                    'sku' =>$sku,
                    'model' => $model,
                    'ikozy_id' => $ikozy_id,
                    'quantity' => $quantity,
                    'manufacturer_id' => $manufacturer_id,
                    'price' =>$price,
                    'discount_price' => $discount_price,
                    'description' => $description,
                    'stock_status_id' => $stock_status,
                    'status' => $status,
                     'refund' => $refund,
                     'featured' => $featured,
                     'shipping' => $shipping,
                    'refund_policy_des'=>(($refund_policy_des!='null'))?$refund_policy_des:NULL,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    
                ];
         
            $product_id = DB::table('product')->insertGetId($product_data);
            
            
            foreach ($categories as $key => $category) {
                $productCategory = ProductToCategory::create(array(
                    'product_id' => $product_id,
                    'category_id' => $category
                ));
            }




              if(!empty($request->optionData)){
            $option=$request->optionData['option'];
            $option_value=$request->optionData['option_value'];
            $option_value_quanity=$request->optionData['option_value_quanity'];
            $option_value_subtract=isset($request->optionData['option_value_subtract'])?$request->optionData['option_value_subtract']:'';

            $option_value_price_prefix=$request->optionData['option_value_price_prefix'];
            $option_value_price=$request->optionData['option_value_price'];
            $option_value_point_prefix=$request->optionData['option_value_point_prefix'];
            $option_value_point=$request->optionData['option_value_point'];
            $option_value_weight_prefix=$request->optionData['option_value_weight_prefix'];
            $option_value_weight=$request->optionData['option_value_weight'];

            $optionData=array();    
            $optionCount=count($option);

            for ($i=0; $i <$optionCount ; $i++) { 
              
                $optionData[$i]['option']=(isset($option[$i])) ? $option[$i]: '';
                $optionData[$i]['option_value']=(isset($option_value[$i])) ? $option_value[$i]: '';
                  $optionData[$i]['option_value_quanity']=($option_value_quanity[$i]!='null')?$option_value_quanity[$i]:1;
                $optionData[$i]['option_value_subtract']=(isset($option_value_subtract[$i])) ? $option_value_subtract[$i]: '';
                $optionData[$i]['option_value_price_prefix']=($option_value_price_prefix[$i]!='null') ? $option_value_price_prefix[$i]: '';
                $optionData[$i]['option_value_price']=($option_value_price[$i]!='null') ? $option_value_price[$i]: '0';
                $optionData[$i]['option_value_point_prefix']=($option_value_point_prefix[$i]!='null') ? $option_value_point_prefix[$i]: '';
                $optionData[$i]['option_value_point']=($option_value_point[$i]!='null') ? $option_value_point[$i]: '0';
                $optionData[$i]['option_value_weight_prefix']=($option_value_weight_prefix[$i]!='null') ? $option_value_weight_prefix[$i]: '';
                $optionData[$i]['option_value_weight']=($option_value_weight[$i]!='null') ? $option_value_weight[$i]: '0';
             
            }

             foreach ($optionData as $key => $option) {
               
                if($option['option']!='null'){

                   $option_name= Option::getName($option['option']);
                    $productOption = ProductOption::create(array(
                    'product_id' => $product_id,
                    'option_id' => $option['option'],
                    'value' => $option_name
                ));


                    $productOptionValue = ProductOptionValue::create(array(
                    'product_option_id' => $productOption->id,
                     'product_id' => $product_id,
                     'option_id' => $option['option'],
                     'option_value_id' =>$option['option_value'],
                     'quantity' =>isset($option['option_value_quanity'])?$option['option_value_quanity']:1,
                     'price' =>isset($option['option_value_price'])?$option['option_value_price']:0,
                     'price_prefix' =>isset($option['option_value_price_prefix'])?$option['option_value_price_prefix']:'',
                     'points' => $option['option_value_point'],
                    'points_prefix' =>isset($option['option_value_point_prefix'])?$option['option_value_point_prefix']:'',
                    'weight' =>isset($option['option_value_weight'])?$option['option_value_weight']:'0',
                    'weight_prefix' => $option['option_value_weight_prefix']
                    
                ));
                }

            }

           
        }
            $attribute_data=[];
           if(!empty($request->attributeData)){
                   $attribute_count = count($request->attributeData['attribute']);
            $attribute_id = $request->attributeData['attribute'];
            $attribute_text = $request->attributeData['attribute_value'];
            for ($i=0; $i <$attribute_count ; $i++) { 
                         $attribute_data[$i]['attribute_id']=$attribute_id[$i];
                         $attribute_data[$i]['attribute_text']=$attribute_text[$i];   
                      
                        }   
                foreach ($attribute_data as $key => $attribute) {
                    if($attribute['attribute_id']!='null'){
                    // if(($attribute['attribute_id']!='null') ||  ($attribute['attribute_id']!='NULL')){    
                        $attr = ProductAttribute::create(array(
                            'product_id' => $product_id,
                            'attribute_id' => $attribute['attribute_id'],
                            'text' => $attribute['attribute_text']
                        
                        ));
                    }
                }
         
            }

                if(!empty($request->productImage)){
                $k=1;
                if($request->has('productImage')){ 
                    if(!empty($request->file('productImage'))){
                        foreach($request->file('productImage') as $file) {
                        if($file)
                        {

                        $image_path=$this->image_upload($file,$k);

                        $product_image = [
                        'product_id'=>$product_id,
                        'image'=>isset($image_path)?$image_path:NULL,
                          
                        ];

                        $product_image_insert=ProductImage::create($product_image);

                        $k=$k+1;
                        } 

                        }
                        }
                }
                
            }



             if($product_id){
                     return response()->json(['success' =>true, 'msg' =>'Sucessfully Create Product','status'=>200 ],200);
             }   

            
                  
        } catch (Exception $e) {
                    return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
           }

    }

    public function delete_product(Request $request,$id){
        try {
            $product=Product::where('id',$id)->first();
           $product->getImages()->delete();
           $product->getOptions()->delete();
           $product->getOptionValues()->delete();
           //$product->getAttributes()->delete();
           ProductAttribute::where('product_id',$id)->delete();
           
           $product->getCategories()->delete();
           $product->delete();

             return response()->json(['success' =>true, 'msg' =>'Sucessfully Deleted Product','status'=>200 ],200);
            
        } catch (Exception $e) {
              return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
        
           

    }


      public function product_edit(Request $request,$id){
        try {
            $product_id =$id;
            $data['product']=Product::find($id);
           /* $data['manufactures']=Manufacture::all();
            $data['categories']=Category::getCategory();*/
           
            //$data['option_values']=OptionValue::all();
            //$data['attributes']=Attribute::where('status',1)->get();
            $data['productImages']=[];
            $product_images=ProductImage::where('product_id',$id)->get();
            foreach ($product_images as $key => $product_img) {
               $data['productImages'][] =[
                'filename'=>$product_img->image,
                'file'=>NULL,
                'src'=>asset($product_img->image)
               ];
            }
       

            $data['product_attributes']=[];
            $product_attributes=\App\Model\Admin\Product::getAttributeValues($id);
            foreach ($product_attributes as $key => $product_attribute) {
                $data['product_attributes'][]=[
                    'attribute'=>$product_attribute->attribute_id,
                    'attribute_value'=>$product_attribute->text,
                ];;
            }
            

            // $product_options=ProductOption::where('product_id',$id)->get();
             //$data['product_option_selected']=[];
               $product_option_value_data=[];
             
			 $product_option_values=ProductOptionValue::where('product_id',$id)->get();
			 
			 foreach ($product_option_values as $key => $product_option_value) {
				 $product_option_value_data[] = [
				  //'product_option_id' => $productOption->id,
                     //'product_id' => $product_id,
                     'option' => $product_option_value['option_id'],
                     'option_value' => $product_option_value['option_value_id'],
                     'option_value_quanity' => $product_option_value['quantity'],
					 'option_value_stock'=>$product_option_value['subtract'],
                     'option_value_price' => $product_option_value['price'],
                     'option_value_price_prefix' => $product_option_value['option_value_price_prefix'],
                     'option_value_point' => $product_option_value['points'],
                    'option_value_point_prefix' => $product_option_value['points_prefix'],
					'option_value_point' => $product_option_value['option_value_point_prefix'],
                    'option_value_weight' => $product_option_value['weight'],
                    'option_value_weight_prefix' => $product_option_value['weight_prefix']
				];	

			}
			 
			 //$data['product_option_selected']=$product_option_values;
			 $data['product_option_selected']=$product_option_value_data;

             $data['product_cats']=[];
            $product_cats=ProductToCategory::where('product_id',$id)->get();
            foreach ($product_cats as $key => $product_cat) {
                $data['product_cats'][]=$product_cat->category_id;
            }


         if ($request->isMethod('post')) {
			 
            
            $name=$request->input('name');
            $meta_title=$request->input('meta_title');
            $meta_description=$request->input('meta_description');
            $sku=$request->input('sku');
            $model=$request->input('model');
            $ikozy_id=$request->input('ikozy_id');
            $quantity=$request->input('quantity');
            $manufacturer_id=$request->input('manufacturer_id');
            $price=$request->input('price');
            $discount_price=$request->input('discount_price');
            
            $description=$request->input('description');
            $stock_status=$request->input('stock_status');
            $status=$request->input('status');

             $refund=$request->input('refund');
             $refund_policy_des=$request->input('refund_policy_des');
             $shipping=$request->input('shipping');
            $featured=$request->input('featured');
            
            // category id array
             $categories=explode(',', $request->input('category_id'));

            $product_data = [
                    'name' => $name,
                    'user_id' =>$this->user_id(),
                    'meta_title' => $meta_title,
                    'meta_description' => $meta_description,
                    'sku' =>$sku,
                    'model' => $model,
                    'ikozy_id' => $ikozy_id,
                    'quantity' => $quantity,
                    'manufacturer_id' => $manufacturer_id,
                    'price' => $price,
                    'discount_price' => $discount_price,
                    'description' => $description,
                    'stock_status_id' => $stock_status,
                     'refund_policy_des'=>(($refund_policy_des!='null'))?$refund_policy_des:NULL,
                    'status' => $status,
                     'refund' => $refund,
                       'featured' => $featured,
                     'shipping' => $shipping,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    
                ];

            $product_update=DB::table('product')->where('id', $id)->update($product_data);
                $del_cat=ProductToCategory::where('product_id',$id)->delete();
             foreach ($categories as $key => $category) {
                $productCategory = ProductToCategory::create(array(
                    'product_id' => $product_id,
                    'category_id' => $category
                ));
            }




            if(!empty($request->optionData)){
                $del_option=ProductOption::where('product_id',$id)->delete();
                $del_option_value=ProductOptionValue::where('product_id',$id)->delete();
            $option=$request->optionData['option'];
            $option_value=$request->optionData['option_value'];
            $option_value_quanity=$request->optionData['option_value_quanity'];
            $option_value_subtract=isset($request->optionData['option_value_subtract'])?$request->optionData['option_value_subtract']:'';

            $option_value_price_prefix=$request->optionData['option_value_price_prefix'];
            $option_value_price=$request->optionData['option_value_price'];
            $option_value_point_prefix=$request->optionData['option_value_point_prefix'];
            $option_value_point=$request->optionData['option_value_point'];
            $option_value_weight_prefix=$request->optionData['option_value_weight_prefix'];
            $option_value_weight=$request->optionData['option_value_weight'];

            $optionData=array();    
            $optionCount=count($option);

            for ($i=0; $i <$optionCount ; $i++) { 
              
                $optionData[$i]['option']=(isset($option[$i])) ? $option[$i]: '';
                $optionData[$i]['option_value']=(isset($option_value[$i])) ? $option_value[$i]: '';
                  $optionData[$i]['option_value_quanity']=($option_value_quanity[$i]!='null')?$option_value_quanity[$i]:1;
                $optionData[$i]['option_value_subtract']=(isset($option_value_subtract[$i])) ? $option_value_subtract[$i]: '';
                $optionData[$i]['option_value_price_prefix']=($option_value_price_prefix[$i]!='null') ? $option_value_price_prefix[$i]: '';
                $optionData[$i]['option_value_price']=($option_value_price[$i]!='null') ? $option_value_price[$i]: '0';
                $optionData[$i]['option_value_point_prefix']=($option_value_point_prefix[$i]!='null') ? $option_value_point_prefix[$i]: '';
                $optionData[$i]['option_value_point']=($option_value_point[$i]!='null') ? $option_value_point[$i]: '0';
                $optionData[$i]['option_value_weight_prefix']=($option_value_weight_prefix[$i]!='null') ? $option_value_weight_prefix[$i]: '';
                $optionData[$i]['option_value_weight']=($option_value_weight[$i]!='null') ? $option_value_weight[$i]: '0';
      
            }

             foreach ($optionData as $key => $option) {
               
                if($option['option']!='null'){

                   $option_name= Option::getName($option['option']);
                    $productOption = ProductOption::create(array(
                    'product_id' => $product_id,
                    'option_id' => $option['option'],
                    'value' => $option_name
                ));


                    $productOptionValue = ProductOptionValue::create(array(
                    'product_option_id' => $productOption->id,
                     'product_id' => $product_id,
                     'option_id' => $option['option'],
                     'option_value_id' =>$option['option_value'],
                     'quantity' =>isset($option['option_value_quanity'])?$option['option_value_quanity']:1,
                     'price' =>isset($option['option_value_price'])?$option['option_value_price']:0,
                     'price_prefix' =>isset($option['option_value_price_prefix'])?$option['option_value_price_prefix']:'',
                     'points' => $option['option_value_point'],
                    'points_prefix' =>isset($option['option_value_point_prefix'])?$option['option_value_point_prefix']:'',
                    'weight' =>isset($option['option_value_weight'])?$option['option_value_weight']:'0',
                    'weight_prefix' => $option['option_value_weight_prefix']
                    
                ));
                }

            }

           
        }
            $attribute_data=[];
           if(!empty($request->attributeData)){
             $del_attribute=ProductAttribute::where('product_id',$id)->delete();
                   $attribute_count = count($request->attributeData['attribute']);
            $attribute_id = $request->attributeData['attribute'];
            $attribute_text = $request->attributeData['attribute_value'];
            for ($i=0; $i <$attribute_count ; $i++) { 
                         $attribute_data[$i]['attribute_id']=$attribute_id[$i];
                         $attribute_data[$i]['attribute_text']=$attribute_text[$i];   
                      
                        }   
                foreach ($attribute_data as $key => $attribute) {
                    if($attribute['attribute_id']!='null'){
                    // if(($attribute['attribute_id']!='null') ||  ($attribute['attribute_id']!='NULL')){    
                        $attr = ProductAttribute::create(array(
                            'product_id' => $product_id,
                            'attribute_id' => $attribute['attribute_id'],
                            'text' => $attribute['attribute_text']
                        
                        ));
                    }
                }
         
            }
                      $exits_image_data=[];
                if(!empty($request->exitsFiles)){
                    $del_image=ProductImage::where('product_id',$id)->delete();
                  $image_count = count($request->exitsFiles['filename']);
                   $imageName = $request->exitsFiles['filename'];
                for ($i=0; $i <$image_count ; $i++) { 
                         $exits_image_data[$i]=$imageName[$i];
                } 


                    foreach ($exits_image_data as $key => $exits_img) {
                        $product_image = [
                        'product_id'=>$product_id,
                        'image'=>isset($exits_img)?$exits_img:NULL,
                          
                        ];

                       $product_image_insert=ProductImage::create($product_image);
                       
                    }

               }

                if(!empty($request->productImage)){
                $k=1;
                if($request->has('productImage')){ 
                    if(!empty($request->file('productImage'))){
                        foreach($request->file('productImage') as $file) {
                        if($file)
                        {

                        $image_path=$this->image_upload($file,$k);

                        $product_image = [
                        'product_id'=>$product_id,
                        'image'=>isset($image_path)?$image_path:NULL,
                          
                        ];

                        $product_image_insert=ProductImage::create($product_image);

                        $k=$k+1;
                        } 

                        }
                        }
                }
                
            }
             
             return response()->json(['success' =>true, 'msg' =>'Sucessfully update Product','status'=>200 ],200);

         }else{
            return response()->json($data,200);
         }
            
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
           


    }

    public function support_category(){
        try {
            $data=SupportCategory::all();
            return response()->json($data,200);
            
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);   
        }
    }

    public function get_support_list(){
        try {
            $supports=Support::where('user_id',$this->user_id())->orderby('created_at','DESC')->get();
            $data = [];
            foreach ($supports as $key => $support) {
                $data[]=[
                    'id'=>$support->id,
                    'category'=>SupportCategory::getName($support->category),
                    'subject'=>$support->subject,
                    'description'=>$support->description,
                    'created_at'=>$support->created_at,
                ];
            }

                return response()->json($data,200);
            
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);   
        }
        }
            

    public function support_view($id){
        try {
            $support=Support::where('id',$id)->first();
             $support_comment=SupportComment::where('support_id',$support->id)->get();
             $data=[
                    'id'=>$support->id,
                    'category'=>SupportCategory::getName($support->category),
                    'subject'=>$support->subject,
                    'description'=>$support->description,
                    'created_at'=>$support->created_at,

                     'comments'=>$support_comment,

                ];   

            return response()->json($data,200);
        } catch (Exception $e) {
         return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);      
        }

         
    }        


 public function update_support_comment(Request $request){
        try {
     
            $data_update = [
                'user_id'=>$this->user_id(),
                'support_id'=>$request->support_id,
                'description'=>$request->description
            ];
            $output = SupportComment::create($data_update);
         
            return response()->json(['status'=>200,'msg'=>'Comments Added!'],200);
         
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);      
        }
    }

    

    public function create_support(Request $request){
        try {
             $data_create=[
                'user_id'=>$this->user_id(),
                'category'=>$request->category,
                'subject'=>$request->subject,
                'description'=>$request->description,
             ];   
            $output=Support::create($data_create);
            if($output->id){
                 return response()->json(['success' =>true, 'msg' =>'Sucessfully Create Support','status'=>200 ],200);
            }else{
                return response()->json(['success' =>false, 'msg' =>'opps! somthing went wrong','status'=>401 ],401);
            }
            
        } catch (Exception $e) {
             return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
        
    }
 public function shipping_view($id){ 
    $datas=ShippingRule::where('id',$id)->first();
     return response()->json($datas,200);

 }

 public function delShipping($id){
    try {
          $datas=ShippingRule::where('id',$id)->delete();
        return response()->json(['success' =>true, 'msg' =>'Sucessfully update shipping rule','status'=>200 ],200);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
    }
    

 }

  public function shipping_update(Request $request,$id){ 
    
   
    try {
     
        
        $status_count=ShippingRule::where('user_id',$this->user_id())->where('state_id',$request->state_id)->where('id','!=',$id)->count();   

        if($status_count==0){
            $output=ShippingRule::where('id',$id)->update($request->all());
         if($output==1){
             return response()->json(['success' =>true, 'msg' =>'Sucessfully update shipping rule','status'=>200 ],200);

         }

        }else{
             return response()->json(['success' =>false, 'msg' =>'Shipping rule is already exits for this state','status'=>422 ],422);

        }


         
    } catch (Exception $e) {
         return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
    }
   

 }

    public function getShipping(){
        try {
            
            $datas=ShippingRule::where('user_id',$this->user_id())->get();

            $data=[];
            foreach ($datas as $key => $value) {
                 $data[]=[
                    'id'=>$value->id,
                       'name'=>$value->name,      
                      'country_id'=>$value->country_id,
                      'state_id'=>$value->state_id,
                     'country_name'=>$this->getCountryName($value['country_id']),
                     'state_name'=>$this->getStateName($value['state_id']),
                      'total_order_cost'=>$value->total_order_cost,
                      'condition'=>$value->condition,
                      'shipping_cost'=>$value->shipping_cost,  
                 ];
             } 

             return response()->json($data,200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
            
        }


        

    }

    public function create_shipping(Request $request){
     
        try {
                $status_count=ShippingRule::where('user_id',$this->user_id())->where('state_id',$request->state_id)->count();


                if($status_count==0){
                     $value =$request->all();
               
                    $data_insert = [
                        'user_id'=>$this->user_id(),
                        'name'=>$value['name'], 
                        'country_id'=>$value['country_id'],
                        'state_id'=>$value['state_id'],
                        'total_order_cost'=>$value['total_order_cost'],
                        'condition'=>$value['condition'],
                        'shipping_cost'=>$value['shipping_cost'],
                        'status'=>$value['status']
                    ];

            $output=ShippingRule::create($data_insert);
             

                     return response()->json(['success' =>true, 'msg' =>'Sucessfully Create ShippingRule','status'=>200  ],200);

                }else{

                    return response()->json(['success' =>false, 'msg' =>'Shipping rule is already exits for this state','status'=>422 ],422);    

                }


           

          
        } catch (Exception $e) {
            return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
        
    }

   
 public function image_upload($image,$index){
      $path = Helper::get_image_path();
       $name = time().'.'.$index.'.'.$image->getClientOriginalExtension(); //get the  file extention
       $destinationPath = public_path($path); //public path folder dir
       $sucess=$image->move($destinationPath, $name);  //mve to destination you mentioned 
      if ($sucess) {
            return $path.$name;
        }

        return NULL;

    }
    
  
}
