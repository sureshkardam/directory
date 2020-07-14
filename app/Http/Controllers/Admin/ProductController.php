<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Product;
use App\Model\Admin\Manufacture;
use App\Model\Admin\Category;
use App\Model\Admin\ProductToCategory;
use App\Model\Admin\ProductImage;
use App\Model\Admin\Option;
use App\Model\Admin\OptionValue;
use App\Model\Admin\Attribute;
use App\Model\Admin\AttributeGroup;
use App\Model\Admin\ProductAttribute;

use App\Model\Admin\ProductOption;
use App\Model\Admin\ProductOptionValue;
use App\User;




use Illuminate\Support\Arr;

class ProductController extends Controller
{

	public function index(Request $request){
	

		$categories=Category::getCategory();
		$sellers = User::where('user_type','=','1')
						->where('status','=','1')
						->get();

	 if ($request->isMethod('post')) { 



	 		$category = $request->input('category');
	 		$status = $request->input('status');
	 		$approval = $request->input('approval');
			$seller = $request->input('seller');
			$cat = $request->input('cat');
			$products = Product::Status($status)->Approval($approval)->Seller($seller)->Category($cat)->get();
			
			
			return view('admin.product-list',compact('products','categories','sellers'));
   

 }else


 {

	$products=Product::all();
    

     return view('admin.product-list',compact('products','categories','sellers'));


 }


	}
	
	public function inventory(Request $request){
	

		$categories=Category::getCategory();
		$sellers = User::where('user_type','=','1')
						->where('status','=','1')
						->get();

	 if ($request->isMethod('post')) { 



	 		$category = $request->input('category');
	 		$status = $request->input('status');
	 		$approval = $request->input('approval');
			$seller = $request->input('seller');
			$cat = $request->input('cat');
			$products = Product::Status($status)->Approval($approval)->Seller($seller)->Category($cat)->get();
			
			return view('admin.product-inventory',compact('products','categories','sellers'));
   

 }else


 {

	$products=Product::all();
    

     return view('admin.product-inventory',compact('products','categories','sellers'));


 }


}

public function productApproval(Request $request){
	
    $categories=Category::getCategory();
	$sellers = User::where('user_type','=','1')
						->where('status','=','1')
						->get();
    

	 if ($request->isMethod('post')) { 

	 		$category = $request->input('category');
	 		$status = $request->input('status');
	 		$approval = $request->input('approval');
			$seller = $request->input('seller');
			$cat = $request->input('cat');
			$products = Product::Status($status)->Approval($approval)->Seller($seller)->Category($cat)->get();
			
			return view('admin.product-approval',compact('products','categories','sellers'));
   				 }else
				
			{
			  $products=Product::where('is_admin_approved','=',0)->get();
			  return view('admin.product-approval',compact('products','categories','sellers'));
			 }
	
	}

	 public function productFeatured(Request $request)
    {
    	 $categories=Category::getCategory();
		 $sellers = User::where('user_type','=','1')
						->where('status','=','1')
						->get();
    

	 if ($request->isMethod('post')) { 

	 		$category = $request->input('category');
	 		$status = $request->input('status');
	 		$approval = $request->input('approval');
			$seller = $request->input('seller');
			$cat = $request->input('cat');
			$products = Product::Status($status)->Approval($approval)->Seller($seller)->Category($cat)->get();
			
			return view('admin.product-featured',compact('products','categories','sellers'));
   				 }else
				 {
				 $products=Product::all();
					return view('admin.product-featured',compact('products','categories','sellers'));
				 }
     
    }
	
	

  
   public function createProduct(Request $request){
    $data['manufactures']=Manufacture::all();
    $data['categories']=Category::getCategory();
$data['options']=Option::where('status','=',1)->get();
$data['attributes']=Attribute::where('status','=',1)->get();


    if ($request->isMethod('post')) { 
   
   
   
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


                   ]);



//general values
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
$featured=$request->input('featured');
$description=$request->input('description');
$stock_status_id=$request->input('stock_status_id');
$status=$request->input('status');
$refund=$request->input('refund');
$refund_policy=$request->input('refund_policy');

// category id array
$categories=$request->input('category_id');
//images
$file=$request->input('file');


$product = Product::create(array(
                    'name' => $name,
'user_id' => 1,
                    'meta_title' => $meta_title,
                    'meta_description' => $meta_description,
'sku' =>$sku,
                    'model' => $model,
                    'ikozy_id' => $ikozy_id,
'quantity' => $quantity,
                    'manufacturer_id' => $manufacturer_id,
                    'price' => $price,
'featured' => $featured,
'discount_price' => $discount_price,
                    'description' => $description,
'stock_status_id' => $stock_status_id,
'refund' => $refund,
'refund_policy_des' => $refund_policy,
'is_admin_approved' => '1',
'status' => $status
                ));


//product category data


foreach($categories as $category)
{
$productCategory = ProductToCategory::create(array(
                    'product_id' => $product->id,
                    'category_id' => $category
                ));

}
//product images array

$i=1;
if($request->has('file')){
  
if(!empty($request->file('file'))){
foreach($request->file('file') as $file) {
if($file)
{

$image_path=$this->image_upload($file,$i);

$product_image = [
'product_id'=>$product->id,
'image'=>isset($image_path)?$image_path:NULL,
  
];

$product_image_insert=ProductImage::create($product_image);

$i=$i+1;
} 

}
}


}
//product images end


//option start

 //for product option value table
$option=$request->input('option');
$option_value=$request->input('option_value');
$option_value_quantity=$request->input('option_value_quantity');
$option_value_subtract=$request->input('option_value_subtract');
$option_value_price_prefix=$request->input('option_value_price_prefix');
$option_value_price=$request->input('option_value_price');
$option_value_point_prefix=$request->input('option_value_point_prefix');
$option_value_point=$request->input('option_value_point');
$option_value_weight_prefix=$request->input('option_value_weight_prefix');
$option_value_weight=$request->input('option_value_weight');
 
 
 
 $result=array();
 //count no of records
 $count=count($option);
 //place all in regular order
 for ($i=0; $i < $count; $i++)
 {
 
$result[$i]['option']=(isset($option[$i])) ? $option[$i]: '';
$result[$i]['option_value']=(isset($option_value[$i])) ? $option_value[$i]: '';
$result[$i]['option_value_quantity']=(isset($option_value_quantity[$i])) ? $option_value_quantity[$i]: '1';
$result[$i]['option_value_subtract']=(isset($option_value_subtract[$i])) ? $option_value_subtract[$i]: '';
$result[$i]['option_value_price_prefix']=(isset($option_value_price_prefix[$i])) ? $option_value_price_prefix[$i]: '';
$result[$i]['option_value_price']=(isset($option_value_price[$i])) ? $option_value_price[$i]: '0';
$result[$i]['option_value_point_prefix']=(isset($option_value_point_prefix[$i])) ? $option_value_point_prefix[$i]: '';
$result[$i]['option_value_point']=(isset($option_value_point[$i])) ? $option_value_point[$i]: '0';
$result[$i]['option_value_weight_prefix']=(isset($option_value_weight_prefix[$i])) ? $option_value_weight_prefix[$i]: '';
$result[$i]['option_value_weight']=(isset($option_value_weight[$i])) ? $option_value_weight[$i]: '0';

 }
 
 
 //insert option table
 
 $option=array_unique(array_filter($option));
 
 
 
 foreach($option as $option_id)
{



$productOption = ProductOption::create(array(
                    'product_id' => $product->id,
                    'option_id' => $option_id
                ));


}	

//product option end
//product option value start

foreach($result as $res)
{	

$productOptionValue = ProductOptionValue::create(array(
                    'product_option_id' => $productOption->id,
'product_id' => $product->id,
                     'option_id' => $res['option'],
'option_value_id' => $res['option_value'],
'quantity' => $res['option_value_quantity'],
'subtract' => $res['option_value_subtract'],
'price' => $res['option_value_price'],
'price_prefix' => $res['option_value_price_prefix'],
'points' => $res['option_value_point'],
'points_prefix' => $res['option_value_point_prefix'],
'weight' => $res['option_value_weight'],
'weight_prefix' => $res['option_value_weight_prefix']

                ));


}
 
//product option value end
 //option  end
 
 
 
 // attributes start
 $attribute=$request->input('attribute');
 $attribute_value=$request->input('attribute_value');
 
 $result = array();
 $count=count($attribute);
 
 for ($i=0; $i < $count; $i++)
 {
 
$result[$i]['attribute']=(isset($attribute[$i])) ? $attribute[$i]: '';
$result[$i]['attribute_value']=(isset($attribute_value[$i])) ? $attribute_value[$i]: '';

 }
 //insert product attribute table
 
 foreach($result as $res)
{	

$attr = ProductAttribute::create(array(
                    'product_id' => $product->id,
'attribute_id' => $res['attribute'],
                    'text' => $res['attribute_value']

                ));


}
 

	return redirect()->route('admin.product')->with('message', 'Product Successfully created!');
    //return redirect()->back()->with('message', 'Product Successfully created!');

    }else{

    return view('admin.add-product',$data);     
    }

    
    }

    public function editProduct(Request $request,$id){
			$data['manufactures']=Manufacture::all();
			$data['categories']=Category::getCategory();
			$data['product']=Product::find($id);
			
			$data['product_attributes']=\App\Model\Admin\Product::getAttributeValues($id);
			
			$data['options']=Option::where('status','=',1)->get();
			$data['master_option_values']=OptionValue::all();
			$data['attributes']=Attribute::where('status','=',1)->get();
			$product_cats=ProductToCategory::where('product_id',$id)->get();
			$data['product_cats']=[];
			foreach ($product_cats as $key => $product_cat) {
			$data['product_cats'][]=$product_cat->category_id;
			}
			
	
	
	
	
			
		
			
		
			if ($request->isMethod('post')) { 
			
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
 'stock_status_id' => 'required',


                   ]);
				   
				   

//general values
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

$featured=$request->input('featured');
$description=$request->input('description');
$stock_status_id=$request->input('stock_status_id');
$status=$request->input('status');
$refund=$request->input('refund');
$refund_policy=$request->input('refund_policy');


// category id array
$categories=$request->input('category_id');
//images
$file=$request->input('file');


$insert_product=array(
                    'name' => $name,
'user_id' => 1,
                    'meta_title' => $meta_title,
                    'meta_description' => $meta_description,
'sku' =>$sku,
                    'model' => $model,
                       'featured' => $featured,

                    'ikozy_id' => $ikozy_id,
'quantity' => $quantity,
                    'manufacturer_id' => $manufacturer_id,
                    'price' => $price,
'discount_price' => $discount_price,
                    'description' => $description,
'stock_status_id' => $stock_status_id,
'refund' => $refund,
'refund_policy_des' => $refund_policy,

'status' => $status
                );

// echo "<pre>";
// print_r($request->all());
// exit();



$product=Product::where('id',$id)->update($insert_product);




//product category data
ProductToCategory::where('product_id',$id)->delete();
			foreach ($categories as $key => $category) {
			$insert_cat=ProductToCategory::create([
			'product_id'=>$id,
			'category_id'=>$category,
			]);
			}



				   
				   
			// check old images and update the table
			$old_file=$request->input('old_file');
			


			$existImages=ProductImage::where('product_id',$id)->get();
			
			if($old_file)
			{

			foreach($existImages as $exist)
				{
				
					
					
					if(!in_array($exist->image,$old_file))
					
					
					{
						$exist->delete();
						
					}
					
				
				}
			
			}else

			{

					foreach($existImages as $exist)
				{
					$exist->delete();
				}

			}



			//end of old image
			//start for new images
			
			
					if($request->has('file')){
				   
						if(!empty($request->file('file'))){
							
							//$del_product=ProductImage::where('product_id',$id)->delete();
							$i=1;
							foreach($request->file('file') as $file) {
									if($file)
								{
								
								


								$image_path=$this->image_upload($file,$i);
								
								$product_image = [
								 'product_id'=>$id,
								'image'=>isset($image_path)?$image_path:NULL,
							   
								];

									$product_image_insert=ProductImage::create($product_image);
								$i=$i+1;
								} 

							}
						}

						
					 }
			   


			







//option start

 //for product option value table
$option=$request->input('option');
$option_value=$request->input('option_value');
$option_value_quantity=$request->input('option_value_quantity');
$option_value_subtract=$request->input('option_value_subtract');
$option_value_price_prefix=$request->input('option_value_price_prefix');
$option_value_price=$request->input('option_value_price');
$option_value_point_prefix=$request->input('option_value_point_prefix');
$option_value_point=$request->input('option_value_point');
$option_value_weight_prefix=$request->input('option_value_weight_prefix');
$option_value_weight=$request->input('option_value_weight');
 
 
 
 $result=array();
 //count no of records
 $count=count($option);
 
 //delete the old values
 if($count > 0)
 {
  ProductOption::where('product_id',$id)->delete();
 
 //end of deletion
 
 
 
 //place all in regular order
 for ($i=0; $i < $count; $i++)
 {
 
$result[$i]['option']=(isset($option[$i])) ? $option[$i]: '';
$result[$i]['option_value']=(isset($option_value[$i])) ? $option_value[$i]: '';
$result[$i]['option_value_quantity']=(isset($option_value_quantity[$i])) ? $option_value_quantity[$i]: '1';
$result[$i]['option_value_subtract']=(isset($option_value_subtract[$i])) ? $option_value_subtract[$i]: '1';
$result[$i]['option_value_price_prefix']=(isset($option_value_price_prefix[$i])) ? $option_value_price_prefix[$i]: '';
$result[$i]['option_value_price']=(isset($option_value_price[$i])) ? $option_value_price[$i]: '0';
$result[$i]['option_value_point_prefix']=(isset($option_value_point_prefix[$i])) ? $option_value_point_prefix[$i]: '';
$result[$i]['option_value_point']=(isset($option_value_point[$i])) ? $option_value_point[$i]: '0';
$result[$i]['option_value_weight_prefix']=(isset($option_value_weight_prefix[$i])) ? $option_value_weight_prefix[$i]: '';
$result[$i]['option_value_weight']=(isset($option_value_weight[$i])) ? $option_value_weight[$i]: '0';

 }
 
 
 //insert option table
 
 $option=array_unique(array_filter($option));
 
 
 
 
 foreach($option as $option_id)
{



$productOption = ProductOption::create(array(
                    'product_id' => $id,
                    'option_id' => $option_id
                ));


}	

//product option end
//product option value start


ProductOptionValue::where('product_id',$id)->delete();


foreach($result as $res)
{	

$productOptionValue = ProductOptionValue::create(array(
                    'product_option_id' => $productOption->id,
'product_id' => $id,
                     'option_id' => $res['option'],
'option_value_id' => $res['option_value'],
'quantity' => $res['option_value_quantity'],
'subtract' => $res['option_value_subtract'],
'price' => $res['option_value_price'],
'price_prefix' => $res['option_value_price_prefix'],
'points' => $res['option_value_point'],
   'points_prefix' => $res['option_value_point_prefix'],
   'weight' => $res['option_value_weight'],
   'weight_prefix' => $res['option_value_weight_prefix']

                ));


}
 
 
 }  //end of option exixts


//product option value end
 //option  end
 
 ProductAttribute::where('product_id',$id)->delete();
 
 // attributes start
 $attribute=$request->input('attribute');
 $attribute_value=$request->input('attribute_value');
 
 $result = array();
 $count=count($attribute);
 
 
 if($count > 0)
 {
 
 for ($i=0; $i < $count; $i++)
 {
 
$result[$i]['attribute']=(isset($attribute[$i])) ? $attribute[$i]: '';
$result[$i]['attribute_value']=(isset($attribute_value[$i])) ? $attribute_value[$i]: '';

 }
 //insert product attribute table
 
 foreach($result as $res)
{	

$attr = ProductAttribute::create(array(
                    'product_id' => $id,
'attribute_id' => $res['attribute'],
                    'text' => $res['attribute_value']

                ));


}
 } //end of attributes
return redirect()->route('admin.product')->with('message', 'Product Updated Successfully!');
    //return redirect()->back()->with('message', 'Product Successfully created!');

			}else{

			return view('admin.edit-product',$data);     
			}

    
    }

    public function image_upload($image,$index){
       $name = time().'.'.$index.'.'.$image->getClientOriginalExtension(); //get the  file extention
       $destinationPath = public_path('/product-image'); //public path folder dir
       $sucess=$image->move($destinationPath, $name);  //mve to destination you mentioned 
      if ($sucess) {
            return 'product-image/'.$name;
        }

        return NULL;

    }
	
	
	
public static function array_to_obj($array, &$obj)
  {
    foreach ($array as $key => $value)
    {
		  if (is_array($value))
		  {
		  $obj->$key = new \stdClass();
		  self::array_to_obj($value, $obj->$key);
		  }
		  else
		  {
			$obj->$key = $value;
		  }
    }
  return $obj;
  }

public static function arrayToObject($array)
		{
		 
		 if($array)
		 {
		 $object= new \stdClass();
		 return self::array_to_obj($array,$object);
		 }
		}


public  function deleteProduct($id){

           $product=Product::where('id',$id)->first();
           $product->getImages()->delete();
		   $product->getOptions()->delete();
		   $product->getOptionValues()->delete();
		   //$product->getAttributes()->delete();
		   
		   $attr=\App\Model\Admin\Product::getAttributeValues($id);
		   $attr->delete();
		   
		   $product->getCategories()->delete();
		   $product->delete();
		   
		   
		  // return redirect()->back()->with('message', 'Successfully Deleted!');
                
           return redirect()->route('admin.product-list')->back()->with('message', 'Successfully Deleted!');

            } 


	

			

}
