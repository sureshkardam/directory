<?php

namespace App\Http\Controllers\Api\Partner;

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
use App\Model\Admin\CsvData;
use Illuminate\Support\Arr;
use Session;
use Illuminate\Support\Facades\Auth;
use Helper;

class ImportController extends Controller
{
  
  private function user_id(){

       
        return Auth::user()->id;
    }



  public function getMapFiled(){
  	$mapFiled=config('app.db_fields');
  	 return response()->json($mapFiled,200);

  }		

   public function parseImport(Request $request)
		{
			try {
     
        $category=$request->input('category_id');
        $imports=CsvData::all()->sortByDesc("created_at");
				$path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

	   
	$records=count($data);
  $records=$records-1;



    $att_data=Attribute::where('status','=',1)->get();
      $all = json_decode(json_encode($att_data), true);
      $attribures = Arr::pluck($all, 'name');
  
      
      $mapArray=array_merge(config('app.db_fields'),$attribures);

         $csv_data_file = CsvData::create([
        'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
        'csv_header' => $request->has('header'),
        'records' => $records,
        'csv_data' => json_encode($data),
        'categories'=>$category,
        'maparray'=>json_encode($mapArray),
    ]);
      
      
    $csv_data = array_slice($data, 0, 2);

     return response()->json([
    		 		'csv_data'=>$csv_data,
    				'csv_data_file'=>$csv_data_file,
    				'csv_file_id'=>$csv_data_file->id,
            'mapArray'=>$mapArray,
            'status'=>200
                    ],200);
				
			} catch (Exception $e) {
				return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);	
			}

			

    
		}


			public function processImport(Request $request)
{
	try{

  
   

        $maps=$request->input('fields');

            if(count(array_filter($maps)) > 0)
            { 

              $data = CsvData::find($request->csv_file_id);

          
            
                if (!empty($data->categories))
                  {
                    $categories = explode(',', $data->categories);
                  }else
                    
                    {
                      return response()->json(['success' => false, 'msg' =>'No Categories Found!','status'=>403 ],403); 
                      
                    }
                
                if (!empty($data->maparray))
                  {
                    $mapArray = json_decode($data->maparray);
                  }else
                  {
                    return response()->json(['success' => false, 'msg' =>'No Fields founf for Mapping!','status'=>403 ],403); 
                         
                    
                  }

           
                  
                $csv_data = json_decode($data->csv_data, true);
                $csv_data = array_slice($csv_data, 1);
                
                $records=count($csv_data);

                foreach ($csv_data as $row) 
                
                {
                          $testaary[]=array();
                          
                          $inner =array();
                          foreach ($mapArray as $index => $field) 
                          
                          {
                            
                            
                            foreach($maps as $key=>$value)
                            {
                            
                            if($value==$index)
                            {
                                
                          
                            $inner[$field]=$row[$key];
                            
                            }
                            }
                          }
                          
                          $testaary[] = $inner;
                  
                }

                $this->parseDataSave(array_values(array_filter($testaary)),$categories);

                $data->status=1;
                $data->records=$records;
                $data->save();

                return response()->json([
                    'status'=>200,
                    'records'=>$records
                    ],200);

            }else{
              return response()->json(['success' => false, 'msg' =>'please select the fields properly!','status'=>403 ],403); 
              
            }
        
    
  }catch (Exception $e) {
        return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500); 
      }

 }

  public function parseDataSave($records,$categories)
  {
    
    try {
      if($this->checkData($records)==true)
        {
        
        
        $attributes=Attribute::where('status','=',1)->get();
        foreach($records as $record)
        {
          
          
          $check_for_att=array();
          $check_for_att=$record;
          $product =new Product();
          
          
            
          if(isset($record['ikozy_id']))
            $product->ikozy_id=$record['ikozy_id'];
      
          if(isset($record['product_name']))
            $product->name=$record['product_name'];
          
          if(isset($record['product_description']))
            $product->description=$record['product_description'];
          
          if(isset($record['meta_title']))
            $product->meta_title=$record['meta_title'];
          
          if(isset($record['meta_description']))
            $product->meta_description=$record['meta_description'];
          
          if(isset($record['meta_keyword']))
            $product->meta_keyword=$record['meta_keyword'];
          
          if(isset($record['sku']))
            $product->sku=$record['sku'];
          
          if(isset($record['model']))
            $product->model=$record['model'];
          
          if(isset($record['quantity']))
            $product->quantity=$record['quantity'];
            
          if(isset($record['status']))
            $product->status=$record['status'];
          
          if(isset($record['stock_status']))
            $product->stock_status_id=$record['stock_status'];
          
          if(isset($record['brand']))
            
            {
              
              $brand=\App\Model\Admin\Manufacture::getId($record['brand']);
              $product->manufacturer_id=(isset($brand)) ? $brand: '0';
              
      
              
            }
          if(isset($record['price']))
            $product->price=$record['price'];
            
          if(isset($record['discounted_price']))
            $product->discount_price=$record['discounted_price'];
          
          if(isset($record['refund_policy']))
          {
            $product->refund_policy_des=$record['refund_policy']; 
            $product->refund=1;
          }
          //set the admin
          $product->user_id=$this->user_id();
          
          //save the product
          $product->save();
          //save the category
          foreach($categories as $category)
              {
              $productCategory = ProductToCategory::create(array(
                                'product_id' => $product->id,
                                'category_id' => $category
                              ));

              }
          //end of category 

              // save product image 

              if(isset($record['images']))
          {
          
          $images=$record['images'];
          
          
          $images=explode(",",$images);
          
          if(count($images) > 0)
          {
            foreach($images as $image)
            {
              $path = Helper::get_image_path();
              $images_path =$path.$image;
                $productImages = ProductImage::create(array(
                                  'product_id' => $product->id,
                                  'image' => $images_path,
                                ));

                }
            
            }
          }
            
        // attribute
        
            foreach($check_for_att as $key => $value)
            {
              foreach($attributes as $attribute)
              {
                  if(strtoupper($attribute->name) == strtoupper($key))
                  {
                    $attr = ProductAttribute::create(array(
                          'product_id' => $product->id,
                          'attribute_id' => $attribute->id,
                          'text' => $value
                          ));

                  }
                
              }
              
              
            }
        
      } 


        }else

        {
           return response()->json(['success' => false, 'msg' =>'Please check the sheet for Brand Name!','status'=>403 ],403); 
          

        } 
             
           } catch (Exception $e) {
             
             return response()->json(['success' => false, 'error' =>$e->getMessage(),'status'=>500 ],500);
           }       
        
  }
    
      public function checkData($records)
    
    {
      $flag='';
      
      foreach($records as $record)
      {
      //check the brand
      if(isset($record['brand']))
            
            {
              
              $brand=\App\Model\Admin\Manufacture::getId($record['brand']);
              if($brand)
              {
                $flag=true;
              }else
              {
                
                $flag=false;
                break;
              }
              
      
              
            }
            
      }
      
      return $flag;
    }

  public function listImport()
    {
       
      $imports=CsvData::orderBy('created_at', 'desc')->get();
         return response()->json($imports,200);
       
       
    }
  

}
