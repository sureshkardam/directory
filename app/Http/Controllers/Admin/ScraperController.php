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

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class ScraperController extends Controller
{
 
    
	
	
	public function getData(Request $request) {
		
		if ($request->isMethod('get')) {
			
			return view('admin.scraper.list');
			
			
		}else
			
			{
				
				
				
			}
		
		
		
		
	}
	
	/*
	$url='https://canada.businessesforsale.com/canadian/search/gas-petrol-service-stations-for-sale';
		$client = new Client(HttpClient::create(['timeout' => 60]));
		$crawler = $client->request('GET', $url);
		$data=$crawler->filter('div.result')->each(function ($node) {
		$name=$node->filter('table.result-table caption')->text();
		$link=$node->filter('table.result-table caption a')->attr('href');
		$location=$node->filter('table.result-table tbody.pure-g tr.t-loc')->text();
		$description=$node->filter('table.result-table tbody.pure-g tr.t-desc td p')->text();
		$image=$node->filter('table.result-table tbody.pure-g tr.t-desc .t-thumb img')->attr('data-src');
		$commerce=$node->filter('table.result-table tbody.pure-g tr.t-finance table')->text();
		return [
			   'name'			=> $name,
			   'link'			=> $link,
			   'location'			=> $location,
			   'description'			=> $description,
			    'image'			=> $image,
				'commerce'			=> $commerce,
			  
				];
			});
			
		$data=json_encode($data);
		
		print_r($data);
		exit;
	*/
	
	public function getListingData(Request $request) {
		
		if ($request->isMethod('post')) {
			
			
		$url=$request->input('url');	
				
		//$url='https://canada.businessesforsale.com/canadian/search/gas-petrol-service-stations-for-sale';
		
		$client = new Client(HttpClient::create(['timeout' => 60]));
		$crawler = $client->request('GET', $url);
		
		
	$total_record=str_replace(' ','',$crawler->filter('span.pagination-num-of-results strong:nth-child(2)')->text());
	$per_page='25';
	$page=(int)floor($total_record/$per_page);
	$pages = ($total_record > $per_page) ? $page : 0 ;

   if($pages >= 1)
   {
	   
	   
					for ($i = 1; $i < $pages + 2; $i++) {
						
						$crawler = $client->request('GET', $url.'-'.$i);
						$data=$crawler->filter('div.result')->each(function ($node) {
						$link=$node->filter('table.result-table caption a')->attr('href');
						return [
							//   'name'			=> $name,
							   'link'			=> $link,
							  // 'location'			=> $location,
							   //'description'			=> $description,
							   // 'image'			=> $image,
							//	'commerce'			=> $commerce,
							  
								];
							});
					   
					   $data=json_encode($data);
				   }
	
	
	$reponse = json_decode($data,true);
	
	foreach($reponse as $data)
	
	{
		
		$client = new Client(HttpClient::create(['timeout' => 60]));
		$crawler = $client->request('GET', $data['link']);
		
		
		
		
		
		
		
	}
	
	
	
   }
   
   
   
   }else// end of post
			
			{
				return view('admin.scraper.list');
			}
		
	}
	
	
	
	public function getDataalert($url,$id) {

	
	Log::info('URL:');
	Log::info($url);
	Log::info('Alert id:');
	Log::info($id);
	
	
	$alert=Alerts::where('id','=', $id)->first();
	
	//$proxy=$alert->apProxy();
	$response=$this->getDynamicProxy();
	
	
	
	Log::info('proxy:');
		Log::info($response->proxy);
		
		Log::info('user agent:');
	    Log::info($response->randomUserAgent);
	
	
	
	
	$client = new Client();
	$client->setHeader('user-agent', $response->randomUserAgent);
	
	
	$crawler = $client->request('GET', $url,['proxy' => $response->proxy]);
	
	$text=$crawler->filterXpath('//meta[@name="description"]')->attr('content');
	print_r($text);
	exit;
	
	
	$total_record=str_replace(' ','',$crawler->filter('span.filtered_results_count')->text());
	
	//$total_record=$crawler->filter('div.results__number')->attr('data-listings-count');
	
	
	
	$per_page='20';
	$page=(int)floor($total_record/$per_page);
	
	
	
	$pages = ($total_record > $per_page) ? $page : 0 ;

   if($pages >= 1)
   {
	
	for ($i = 1; $i < $pages + 2; $i++) {
        //if ($i != 1) {
          Log::info($i);  
			//$crawler = Goutte::request('GET', $url.'?page='.$i,['proxy' => $proxy]);
			$crawler = $client->request('GET', $url.'?page='.$i,['proxy' => $response->proxy]);
			//$crawler = Goutte::request('GET', $url.'?page='.$i,['proxy' => $proxy]);
       // }
			//extract data
        $data=$crawler->filter('div.listing')->each(function ($node) {
	
	$listing_id=$node->attr('data-id');
	$cluster_id=$node->attr('data-cluster-id');
	if($node->filter('div.listing__photos-count')->count() > 0){$image_count=$node->filter('div.listing__photos-count')->text();}else{$image_count='1';}
	if($node->filter('div.price')->count() > 0){$price=$node->filter('div.price')->text();}else{$price='none';}
	if($node->filter('div.listing__address')->count() > 0){$address=$node->filter('div.listing__address')->text();}else{$address='none';}
	if($node->filter('div.listing__data--area-size')->count() > 0){$area=$node->filter('div.listing__data--area-size')->text();}else{$area='none';}
	if($node->filter('div.listing__data--plot-size')->count() > 0){$plot=$node->filter('div.listing__data--plot-size')->text();}else{$plot='none';}
	if($node->filter('div.listing__data--room-count')->count() > 0){$room_count=$node->filter('div.listing__data--room-count')->text();}else{$room_count='none';}
	if($node->filter('a.listing__thumbnail img')->count() > 0){$image=$node->filter('a.listing__thumbnail img')->attr('src');}else{$image='none';}
	$link=$node->filter('div.listing__card a')->attr('href');
	
	
			//print "<a href='".$node->attr('data-id')."'>".$node->attr('data-id')."</a><br/>";
	return [
       'listing_id'			=> $listing_id,
	   'cluster_id'			=> $cluster_id,
	   'image_count'		=> $image_count,
	   'price'				=> $price,
	   'address'			=> $address,
	   'area'				=> $area,
	   'plot'				=> $plot,
	   'room_count'			=> $room_count,
	   'image'				=> $image,
	   'link'				=> $link,
		];
    });
	
	$data=json_encode($data);
	
	
	
	$reponse = json_decode($data,true);
	//Log::info($reponse); 
	
	
	
	foreach($reponse as $data)
	
	{
		
		
		// 
		$find=Listing::where('listing_id','=', $data['listing_id'])
						->where('alert_id',$id)
						->where('user_id',$alert->site_user_id)
						->first();
		
		if(!$find)
		{
		
		$listing = Listing::Create(array(
         
       'listing_id'			=> $data['listing_id'],
	   'cluster_id'			=> $data['cluster_id'],
	   'image_count'		=> $data['image_count'],
	   'price'				=> $data['price'],
	   'address'			=> $data['address'],
	   'area'				=> $data['area'],
	   'plot'				=> $data['plot'],
	   //'plot'				=> 'empty',
	   'room_count'			=> $data['room_count'],
	   'image'				=> $data['image'],
	   'link'				=> $data['link'],
	   'alert_id'			=> $id,
	  // 'user_id'			=> '1',
	   'user_id'			=> $alert->site_user_id,
	   'email_sent'			=> '0',
		));
		
		}
		
		
		
		
	}
		//end of extract data
    }
	//return json_encode($data);
   }
	
}
	
	
	
	
	
	
}
