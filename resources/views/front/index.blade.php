@extends('front.layouts.app') 
@section('content')

@include('front.layouts.home_search') 

<style>

.how-it-custom .box_how {
    border: solid 3px #cd9d0e;
    padding: 40px 20px;
}
.how-it-custom .box_how p {
    margin: 0;
}
.how-it-custom .box_how .img-work {
    height: 140px;
    overflow: hidden;
    width: 200px;
    display: inline-block;
    margin-bottom: 11px;
    border: solid 1px #ddd;
    background: #dddddd9c;
}
.how-it-custom .box_how a {
    margin-top: 11px;
    display: inline-block;
    border-radius: 100px;
}
</style>

		<div class="container margin_80_55">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Popular Provinces</h2>
				
			</div>
			
			<div id="location" class="row">				
				<div class="col-lg-12 col-md-12">
					<ul class="pop-cat-grid">
						<li class="pop-cat">
							<a href="{{url('location','663')}}" class="pop-cat-link">
								<div class="cat-img">
									<img src="https://canada.businessesforsale.com/build/images/PopularLocations/Tiles/calgary.jpg">
								</div>
								<div class="cat-content">
									<div class="cat-content-wrap">
										<span class="cat-title">Alberta</span>
		<span class="cat-count">({{\App\Model\Admin\Category::getListingsByLocationCount(663)}}}</span>
									</div>
								</div>
							</a>
						</li>
						
						
						<li class="pop-cat">
							<a href="{{url('location','664')}}" class="pop-cat-link">
								<div class="cat-img">
									<img src="https://canada.businessesforsale.com/build/images/PopularLocations/Tiles/vancouver.jpg">
								</div>
								<div class="cat-content">
									<div class="cat-content-wrap">
										<span class="cat-title">British Columbia</span>
										
										<span class="cat-count">({{\App\Model\Admin\Category::getListingsByLocationCount(664)}}}</span>
									</div>
								</div>
							</a>
						</li>
						
						<li class="pop-cat">
							<a href="{{url('location','665')}}" class="pop-cat-link">
								<div class="cat-img">
									<img src="https://canada.businessesforsale.com/build/images/PopularLocations/Tiles/edmonton.jpg">
								</div>
								<div class="cat-content">
									<div class="cat-content-wrap">
										<span class="cat-title">Manitoba</span>
										<span class="cat-count">({{\App\Model\Admin\Category::getListingsByLocationCount(665)}}}</span>
									</div>
								</div>
							</a>
						</li>
						
						
						
						<li class="pop-cat">
							<a href="{{url('location','666')}}" class="pop-cat-link">
								<div class="cat-img">
									<img src="https://canada.businessesforsale.com/build/images/PopularLocations/Tiles/british-columbia.jpg">
								</div>
								<div class="cat-content">
									<div class="cat-content-wrap">
										<span class="cat-title">New Brunswick</span>
										<span class="cat-count">({{\App\Model\Admin\Category::getListingsByLocationCount(666)}}}</span>
									</div>
								</div>
							</a>
						</li>
						
						<li class="pop-cat">
							<a href="{{url('location','669')}}" class="pop-cat-link">
								<div class="cat-img">
									<img src="https://canada.businessesforsale.com/build/images/PopularLocations/Tiles/costa-rica.jpg">
								</div>
								<div class="cat-content">
									<div class="cat-content-wrap">
										<span class="cat-title">Nova Scotia</span>
										<span class="cat-count">({{\App\Model\Admin\Category::getListingsByLocationCount(669)}}}</span>
									</div>
								</div>
							</a>
						</li>
						
						<li class="pop-cat">
							<a href="{{url('location','673')}}" class="pop-cat-link">
								<div class="cat-img">
									<img src="https://canada.businessesforsale.com/build/images/PopularLocations/Tiles/montreal.jpg">
								</div>
								<div class="cat-content">
									<div class="cat-content-wrap">
										<span class="cat-title">Quebec</span>
										<span class="cat-count">({{\App\Model\Admin\Category::getListingsByLocationCount(673)}}}</span>
									</div>
								</div>
							</a>
						</li>
						
						<li class="pop-cat">
							<a href="{{url('location','671')}}" class="pop-cat-link">
								<div class="cat-img">
									<img src="https://canada.businessesforsale.com/build/images/PopularLocations/Tiles/toronto.jpg">
									
								</div>
								<div class="cat-content">
									<div class="cat-content-wrap">
										<span class="cat-title">Ontario</span>
										<span class="cat-count">({{\App\Model\Admin\Category::getListingsByLocationCount(671)}}}</span>
									</div>
								</div>
							</a>
						</li>
						
						<li class="pop-cat">
							<a href="{{url('location','674')}}" class="pop-cat-link">
								<div class="cat-img">
									<img src="https://canada.businessesforsale.com/build/images/PopularLocations/Tiles/belize.jpg">
								</div>
								<div class="cat-content">
									<div class="cat-content-wrap">
										<span class="cat-title">Saskatchewan</span>
										<span class="cat-count">({{\App\Model\Admin\Category::getListingsByLocationCount(674)}}}</span>
									</div>
								</div>
							</a>
						</li>
						
					</ul>
				</div>
				
			</div>
			
			<div class="container">
				<div class="btn_home_align"><a href="{{url('view/all')}}" class="btn_1 rounded">View all</a></div>
			</div>
			
		</div>
		
		
		<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>Popular Categories</h2>
					
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-6">
						<a href="{{url('category','business-gas-stations')}}" class="box_cat_home">
							<i class="icon_menu-circle_alt"></i>
							<img src="{{ asset('front/img/home/gas-station.png') }}" width="65" height="65" alt="">
							<h3>Gas Stations</h3>
							<ul>
								<li><strong>{{\App\Model\Admin\Category::getListingsCount('business-gas-stations')}}</strong>Listings</li>
							</ul>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a href="{{url('category','business-pharmacies')}}" class="box_cat_home">
							<i class="icon_menu-circle_alt"></i>
							<img src="{{ asset('front/img/home/pharmacy.png') }}" width="65" height="65" alt="">
							<h3>Pharmacies</h3>
							<ul class="clearfix">
								<li><strong>{{\App\Model\Admin\Category::getListingsCount('business-pharmacies')}}</strong>Listings</li>
							</ul>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a href="{{url('category','business-retail')}}" class="box_cat_home">
							<i class="icon_menu-circle_alt"></i>
							<img src="{{ asset('front/img/home/retail.png') }}" width="65" height="65" alt="">
							<h3>Retails</h3>
							<ul class="clearfix">
								<li><strong>{{\App\Model\Admin\Category::getListingsCount('business-retail')}}</strong>Listings</li>
							</ul>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a href="{{url('category','business-manufacturing')}}" class="box_cat_home">
							<i class="icon_menu-circle_alt"></i>
							<img src="{{ asset('front/img/home/manufacture.png') }}" width="65" height="65" alt="">
							<h3>Manufacturer</h3>
							<ul class="clearfix">
								<li><strong>{{\App\Model\Admin\Category::getListingsCount('business-manufacturing')}}</strong>Listings</li>
							</ul>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a href="{{url('category','business-construction')}}" class="box_cat_home">
							<i class="icon_menu-circle_alt"></i>
							<img src="{{ asset('front/img/home/construction.png') }}" width="65" height="65" alt="">
							<h3>Construction</h3>
							<ul class="clearfix">
								<li><strong>{{\App\Model\Admin\Category::getListingsCount('business-construction')}}</strong>Listings</li>
							</ul>
						</a>
					</div>
					<div class="col-lg-3 col-md-6">
						<a href="{{url('category','business-food-businesses')}}" class="box_cat_home">
							<i class="icon_menu-circle_alt"></i>
							<img src="{{ asset('front/img/home/food-Business.png') }}" width="65" height="65" alt="">
							<h3>Food Businesses</h3>
							<ul class="clearfix">
								<li><strong>{{\App\Model\Admin\Category::getListingsCount('business-food-businesses')}}</strong>Listings</li>
							</ul>
						</a>
					</div>
				</div>
				
			</div>
			
		</div>
		
		
		<div class="call_section image_bg" style="background: #004dda;">
			<div class="wrapper">
				<div class="container margin_80_55">
					<div class="main_title_2">
						<span><em></em></span>
						<h2>Featured Business Opportunities </h2>
						<!--<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>-->
					</div>
					<div id="howWorks" class="owl-carousel owl-theme how-it-custom">
						@foreach(\App\Model\Admin\Listing::Featured()->take(10)->get() as $listing)
						<div class="item">
							<div class="box_how wow">
								<div class="img-work"><img src="{{$listing->listing_main_image}}"></div>
								<h3>{{Str::limit($listing->listing_title, 30, $end='...') }}</h3>
								<p>{{Str::limit($listing->listing_description, 60, $end='...') }}</p>
								<a href="{{url('listing',$listing->id)}}" class="btn btn-primary">View Detail</a>
							</div>
						</div>
						@endforeach
					</div>
					
					<!--<p class="text-center add_top_30 wow bounceIn" data-wow-delay="0.5"><a href="register.html" class="btn_1 rounded">Register Now</a></p>-->
				</div>
			</div>
			
		</div>
		

@endsection