				
								

@forelse ($listings as $listing)



					<div class="strip list_view">					
						<div class="strip-main-div">
							<div class="strip-mainHead">
								<h3><a href="{{url('listing',$listing->id)}}">{{Str::title($listing->listing_title)}}</a></h3>
								<small>{{\App\Model\Admin\State::getName($listing->getLocation->state)}}</small>
								<i class="icon_pin_alt"></i>
							</div>
							<div class="strip-mainBody">
								<div class="mainbody-image">
									<!--<a href="detail-restaurant.html"><img src="img/location_2.jpg" class="img-fluid" alt=""></a>-->
									
									
								</div>
								<div class="mainbody-content">
									<p>
									
									{{Str::limit($listing->listing_description, 300, $end='...') }}
									
									</p>
								</div>
								<div class="mainbody-labels">
									<ul>
										@if($listing->getAdditional->asking_price)
										<li>
											<h5>Asking Price:</h5>
											<p>{{$listing->getAdditional->asking_price}}</p>
										</li>
										@endif
										@if($listing->getAdditional->gross_revenue)
										<li>
											<h5>Revenue:</h5>
											<p>{{$listing->getAdditional->gross_revenue}}</p>
										</li>
										@endif
										@if($listing->getAdditional->cash_flow)
										<li>
											<h5>Cash Flow:</h5>
											<p>{{$listing->getAdditional->cash_flow}}</p>
										</li>
										@endif
										
										@if($listing->getAdditional->sales_revenue)
											
										<li>
											<h5>Sales Revenue:</h5>
											<p>{{$listing->getAdditional->sales_revenue}}</p>
										</li>
									
									@endif
									
									</ul>
								</div>
							</div>
							<div class="strip-mainFoot">
								<div class="mainFoot-links">
									
									@if($listing->getCategories)
									<ul>
										
					@foreach($listing->getCategories as $cat)
					<li>{{\App\Model\Admin\Category::getName($cat->category_id)}}</li>
											
											@endforeach
											
									</ul>
									@endif
								</div>
								<div class="mainFoot-button">
								
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactSeller">
  Contact Seller
</button>
								</div>
							</div>
						</div>
					</div>
					@empty
							
							
					<div class="strip list_view nthng">
						<div class="row no-gutters">
							
							<div class="col-lg-12">
								<div class="wrapper">
							<h3 class="text-center">No Listing</h3>
							
							</div>
							</div>
							</div>
							</div>
					@endforelse
		
		