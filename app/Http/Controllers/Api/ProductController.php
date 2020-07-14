<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Product;
use App\Model\Admin\Manufacture;
use App\Model\Admin\Category;
use App\Model\Admin\ProductToCategory;
use App\Model\Admin\ProductImage;
use App\Model\Admin\ProductOption;
use  App\Model\Admin\Attribute;


class ProductController extends Controller
{

    public function getAllproduct(){
        try {

            $allProducts=[];
            $products=DB::table('product_to_category as pc')
            ->select(['p.id','p.name as product_name','p.description','p.price','m.image as manufacturer_image','pi.image as product_image'])
            ->leftJoin('product as p', 'pc.product_id', '=', 'p.id')
            ->leftJoin('product_image as pi', 'p.id', '=', 'pi.product_id')
            ->leftJoin('manufacturer as m', 'p.manufacturer_id', '=', 'm.id')
            ->groupBy('p.id')
            ->get();

            if(!empty($products)){
                foreach ($products as $key => $product) { 
                    $allProducts[]=[
                        'id'=>$product->id,
                        //'ikozy_id'=>$product->ikozy_id,
                        'name'=>$product->product_name,
                        'image'=>isset($product->product_image)?asset($product->product_image):asset('no-image.jpg'),
                        'manufacturer_image'=>isset($product->manufacturer_image)?asset($product->manufacturer_image):'',
                        'price'=>$product->price,
                        'description'=>$product->description
                    ];
                }

            }
   
            
             return response()->json($allProducts,200);
        } catch (Exception $e) {
                return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
        }
    }

    public function getCategoryProduct(Request $reqest,$category_id){
    	try {

    		$allProducts=[];
            $products=DB::table('product_to_category as pc')
			->select(['p.id','p.name as product_name','p.description','p.price','m.image as manufacturer_image','pi.image as product_image'])
			->leftJoin('product as p', 'pc.product_id', '=', 'p.id')
			->leftJoin('product_image as pi', 'p.id', '=', 'pi.product_id')
			->leftJoin('manufacturer as m', 'p.manufacturer_id', '=', 'm.id')
			->where('pc.category_id', $category_id)
			->groupBy('p.id')
			->get();

			if(!empty($products)){
				foreach ($products as $key => $product) { 
					$allProducts[]=[
						'id'=>$product->id,
                    	//'ikozy_id'=>$product->ikozy_id,
                    	'name'=>$product->product_name,
                    	'image'=>isset($product->product_image)?asset($product->product_image):asset('no-image.jpg'),
                    	'manufacturer_image'=>isset($product->manufacturer_image)?asset($product->manufacturer_image):'',
                    	'price'=>$product->price,
                    	'description'=>$product->description
					];
				}

			}
   
    		
    		 return response()->json($allProducts,200);
    	} catch (Exception $e) {
    			return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
    	}

    }


    public function productDetails($id){
    	try {
    		$productData=Product::find($id);

			$data['product']= $productData;    		
    		$manufacturer=Manufacture::where('id',$productData->manufacturer_id)->first();
    		$data['manufacturer_image'] = isset($manufacturer->image)?asset($manufacturer->image):'';
    	   $data['product_attributes']=[];
            $product_attributes=\App\Model\Admin\Product::getAttributeValues($id);
            if(!empty($product_attributes)){
            	foreach ($product_attributes as $key => $product_attribute) {
                $data['product_attributes'][]=[
                    'attribute'=>Attribute::getName($product_attribute->attribute_id),
                    'attribute_value'=>$product_attribute->text,
                ];
              }	
            }
             $data['productImages']=[];
            $product_images=ProductImage::where('product_id',$id)->get();
            if(!empty($product_images)){
            		   foreach ($product_images as $key => $product_img) {
               $data['productImages'][] =  asset($product_img->image);
               
            }

            }
         

         return response()->json($data,200);   
    		
    	} catch (Exception $e) {
    		return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
    	}
    	

    }
}
