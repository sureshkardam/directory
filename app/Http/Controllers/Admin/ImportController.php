<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Listing;
use App\Model\Admin\Category;
use App\Model\Admin\ListingToCategory;
use App\Model\Admin\ListingImage;
use App\Model\Admin\ListingSocial;
use App\Model\Admin\ListingLocation;
use App\Model\Admin\ListingField;
use App\Model\Admin\ListingAdditional;
use App\Model\Admin\CsvData;
use App\Model\Admin\Website;

use App\User;
use Illuminate\Support\Arr;
use Session;

use App\Imports\ImportListing;

use Log;






class ImportController extends Controller
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
  

    public function listImport()
		{
			 
			
			
			
			$imports=CsvData::all()->sortByDesc("created_at");
			 return view('admin.upload-product.list', compact('imports'));
			 
		}
	
	public function getImport()
		{
			 
			 $categories=Category::getCategory();
			  $websites=Website::all();
			
			 return view('admin.upload-product.import', compact('categories','websites'));
			 
		}
	

   
	public function parseImport(Request $request)
		{
	$imports=CsvData::all()->sortByDesc("created_at");
	
	if ($request->isMethod('get')){
		return view('admin.upload-product.list', compact('imports'));
		
	}else{
	
	Session::forget('categories');
	Session::forget('mapArray');
	Session::forget('website_id');
	
	  
	
	$categories=$request->input('category_id');
	$website_id=$request->input('website');
	$path = $request->file('csv_file')->getRealPath();
	$data = array_map('str_getcsv', file($path));
	$data = $this->convert_from_latin1_to_utf8_recursively($data);	
	
	
	  $csv_data_file = CsvData::create([
        'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
        'csv_header' => $request->has('header'),
		'records' => count($data)-1,
        'csv_data' => json_encode($data,true)
    ]);
	
			//$additional=ListingField::all()->except(['id','listing_id','field_name','field_value','sort_order','created_at','updated_at'])->toArray();
			
			//$location=ListingLocation::all()->except(['id','listing_id','created_at','updated_at'])->toArray();
			
			//$category_list=ListingToCategory::all()->except(['id','listing_id','created_at','updated_at'])->toArray();
			//$social_all = json_decode(json_encode($social), true);
			//$social_to_map = Arr::pluck($social_all, 'facebook');
	
			//merge to the config data array
			//echo"<pre>";
			//print_r(array_merge(config('app.db_fields'),$attribures));
			//exit;
			$mapArray=config('app.db_fields');
			
			Session::put('categories', $categories);
			Session::put('mapArray', $mapArray);
			Session::put('website_id', $website_id);
			
			
			
			
			
    $csv_data = array_slice($data, 0, 2);
	
	
	
	
	
    return view('admin.upload-product.map', compact('csv_data', 'csv_data_file','mapArray'));
		}
}
	
	
	
	
	public function processImport(Request $request)
	{
			$imports=CsvData::all()->sortByDesc("created_at");
	
			if ($request->isMethod('get')){
				return view('admin.upload-product.list', compact('imports'));
				
			}else{
				
				
					$maps=$request->input('fields');
					
						if(count(array_filter($maps)) > 0)
							//if(count($maps) == 0)
						{
								
								
								//get category
								
								if (Session::has('categories'))
									{
										$categories = Session::get('categories');
									}else
										
										{
											return redirect()->route('admin.import.list')->with('error', 'No Categories Found!');	
										}
								
								//get map array
								if (Session::has('mapArray'))
									{
										$mapArray = Session::get('mapArray');
									}else
									{
										return redirect()->route('admin.import.list')->with('error', 'No Fields found for Mapping!');					
										
									}
								
								//process
								
								
							
								
								
								$data = CsvData::find($request->csv_data_file_id);
								$csv_data = json_decode($data->csv_data, true);
								$csv_data = array_slice($csv_data, 1);
								
								$records=count($csv_data);
								
								
								$testaary[]=array();
								foreach ($csv_data as $row) 
								
								{
													
													
													$inner =array();
													foreach ($mapArray as $index => $field) 
													
													{
														
														
														foreach($maps as $key=>$value)
														{
														
															if(($value==$index) && !empty($value))
															{
																	
														
															$inner[$field]=$row[$key];
															
															}
												
														}
													}
													
													$testaary[] = $inner;
									
								}
							
							
						
								
							$this->parseDataSave(array_values(array_filter($testaary)),$categories);	
								
							//update the record file table
							$data->status=1;
							$data->records=$records;
							$data->save();
							// end of record save table
								
								return view('admin.upload-product.success', compact('records'));	
							
							
						}else
							
							{
							return redirect()->route('admin.import.list')->with('error', 'please select the fields properly!');		
								
							}
				
						
			}
	}


		public function parseDataSave($records,$categories)

			{
				
				
				/*
				echo"<pre>";
				print_r($records);
				exit;
			*/
				
				
				
				foreach($records as $record)
				{
							$additional=array();
							$additional=$record;
							
							
							
							
					
							$listing=$this->saveListing($record);
			
							$this->saveListingAdditional($listing->id,$record);
							$this->saveListingLocation($listing->id,$record);
							$this->saveListingSocial($listing->id,$record);
							$this->saveListingCategory($listing->id,$categories);
							
							
							//$this->saveListingField($newListing->id,$additional);
							
							
							
							
							if(isset($record['listing_additional_image']))
							{
							$this->saveListingImage($listing->id,$record['listing_additional_image']);
										
							}
							
							
							
							
				
				}	


							
				
}



public function saveListingField($id,$records)
		
{
				$attributes=ListingFields::all();	
					
				foreach($records as $key => $value)
						{
							foreach($attributes as $attribute)
							{
									if(strtoupper($attribute->name) == strtoupper($key))
									{
										$attr = ListingField::create(array(
													'listing_id' => $listing->id,
													'attribute_id' => $attribute->id,
													'text' => $value
													));

									}
								
							}
							
							
						}
					
}


public function saveListing($record)
		
{
	
				$listing =new Listing();

					
					if (Session::has('website_id'))
									{
									$website_id = Session::get('website_id');	
									$listing->website_id=$website_id;	
									}
					
					
					
					
					if(isset($record['sub_list_id']))
						$listing->sub_list_id=$record['sub_list_id'];
			
					if(isset($record['listing_title']))
						$listing->listing_title=$record['listing_title'];
					
					if(isset($record['listing_keywords']))
						$listing->listing_keywords=$record['listing_keywords'];
					
					if(isset($record['listing_description']))
						$listing->listing_description=$record['listing_description'];
					
					if(isset($record['listing_meta_title']))
						$listing->listing_meta_title=$record['listing_meta_title'];
					
					if(isset($record['listing_meta_description']))
						$listing->listing_meta_description=$record['listing_meta_description'];
					
					if(isset($record['listing_meta_keyword']))
						$listing->listing_meta_keyword=$record['listing_meta_keyword'];
					
					if(isset($record['listing_phone']))
						$listing->listing_phone=$record['listing_phone'];
					
					if(isset($record['listing_website']))
						$listing->listing_website=$record['listing_website'];
						
					if(isset($record['listing_email']))
						$listing->listing_email=$record['listing_email'];
					
					if(isset($record['listing_contact_name']))
						$listing->listing_contact_name=$record['listing_contact_name'];
					
					
					
					
					if(isset($record['listing_main_image']))
						$listing->listing_main_image=$record['listing_main_image'];
										
					//set the admin
					$listing->user_id=1;
					
					//save the product
					$listing->save();
					//save the listing table
					return $listing;
			
}


public function saveListingLocation($id,$record)
		
{
					$location =new ListingLocation();
					if(isset($record['address']))
						$location->address=$record['address'];
					if(isset($record['city']))
						$location->city=$record['city'];
					
					if(isset($record['state']))
					{	
					$state=\App\Model\Admin\State::getId($record['state']);
					//$product->manufacturer_id=(isset($brand)) ? $brand: '0';
					//$location->state=$state;
					
					$location->state=(isset($state)) ? $state: '0';
					
					}
					
					
					if(isset($record['country']))
					{	
					$country=\App\Model\Admin\Country::getId($record['country']);
					$location->country=$country;
					
					}
					
					if(isset($record['zip_code']))
						$location->zip_code=$record['zip_code'];
								
					$location->listing_id=$id;
					$location->save();
					
}

public function saveListingSocial($id,$record)
		
{
					
					
					
					$social =new ListingSocial();
					if(isset($record['facebook']))
						$social->facebook=$record['facebook'];
					if(isset($record['twitter']))
						$social->twitter=$record['twitter'];
					if(isset($record['instagram']))
						$social->instagram=$record['instagram'];
					if(isset($record['google_plus']))
						$social->google_plus=$record['google_plus'];
								
					$social->listing_id=$id;
					$social->save();
					
}

public function saveListingAdditional($id,$record)
		
{
					$additional =new ListingAdditional();
					if(isset($record['financing']))
						$additional->financing=$record['financing'];
					if(isset($record['franchise']))
						$additional->franchise=$record['franchise'];
					if(isset($record['year_established']))
						$additional->year_established=$record['year_established'];
					if(isset($record['number_of_employee']))
						$additional->number_of_employee=$record['number_of_employee'];
					
					
					
					if(isset($record['asking_price']))
						$additional->asking_price=$record['asking_price'];
					
					if(isset($record['gross_revenue']))
						$additional->gross_revenue=$record['gross_revenue'];
					
					
					if(isset($record['sales_revenue']))
						$additional->sales_revenue=$record['sales_revenue'];
					
					
					if(isset($record['cash_flow']))
						$additional->cash_flow=$record['cash_flow'];
					
					
					if(isset($record['down_payment']))
						$additional->down_payment=$record['down_payment'];
					
					if(isset($record['inventory']))
						$additional->inventory=$record['inventory'];
					
					
					
					if(isset($record['office_area_type']))
						$additional->office_area_type=$record['office_area_type'];
					
					if(isset($record['reason_for_selling']))
						$additional->reason_for_selling=$record['reason_for_selling'];
					if(isset($record['support_training']))
						$additional->support_training=$record['support_training'];
					if(isset($record['ff_and_d_included']))
						$additional->ff_and_d_included=$record['ff_and_d_included'];
					
					
					if(isset($record['ebitda']))
						$additional->ebitda=$record['ebitda'];
				
					$additional->listing_id=$id;
					$additional->save();
					
}
public function saveListingCategory($id,$categories)
{
					//category
					foreach($categories as $category)
							{
							$listingCategory = ListingToCategory::create(array(
																'listing_id' => $id,
																'category_id' => $category
															));

							}
					//end of category
	
}


public function saveListingImage($id,$images)
		
{
				$images=explode(",",$images);
					
					if(count($images) > 0)
					{
						foreach($images as $image)
						{
								$ListingImages = ListingImage::create(array(
																	'listing_id' => $id,
																	'image' => $image
																));

						}
						
					}
					
}






		
		
		public function checkData($records)
		
		{
			$flag=false;
			
			
			
			foreach($records as $record)
			{
			
			Log::info('state name is :');
			Log::info($record['state']);
			
			if(isset($record['state']))
						
						{
				
							$state=\App\Model\Admin\State::getId($record['state']);
							if($state)
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
		
		
		
		public static function convert_from_latin1_to_utf8_recursively($dat)
   {
      if (is_string($dat)) {
         return utf8_encode($dat);
      } elseif (is_array($dat)) {
         $ret = [];
         foreach ($dat as $i => $d) $ret[ $i ] = self::convert_from_latin1_to_utf8_recursively($d);

         return $ret;
      } elseif (is_object($dat)) {
         foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);

         return $dat;
      } else {
         return $dat;
      }
   }	

}
