@extends('front.layouts.app') 
@section('content')

@include('front.layouts.inner_search')


<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						
						<section id="description">
							<div class="detail_title_1">
								
							
								<h1>{{$listing->listing_title}}</h1>
								
							</div>
							<p>{{$listing->listing_description}}</p>
					
							
							<hr>
							<h3>Details</h3>
							<table class="table table-striped add_bottom_45">
								<tbody>
									
									
									@if($listing->getAdditional->asking_price)
									<tr>
										<td>Asking Price</td>
										<td>{{$listing->getAdditional->asking_price}}</td>
									</tr>
									@endif
									
									@if($listing->getAdditional->gross_revenue)
									<tr>
										<td>Gross Revenue</td>
										<td>{{$listing->getAdditional->gross_revenue}}</td>
									</tr>
									@endif
									@if($listing->getAdditional->sales_revenue)
									<tr>
										<td>Sales Revenue</td>
										<td>{{$listing->getAdditional->sales_revenue}}</td>
									</tr>
									@endif
									@if($listing->getAdditional->cash_flow)
									<tr>
										<td>Cash Flow</td>
										<td>{{$listing->getAdditional->cash_flow}}</td>
									</tr>
									@endif
									@if($listing->getAdditional->down_payment)
									<tr>
										<td>Down Payment</td>
										<td>{{$listing->getAdditional->down_payment}}</td>
									</tr>
									@endif
									@if($listing->getAdditional->inventory)
									<tr>
										<td>Inventory</td>
										<td>{{$listing->getAdditional->inventory}}</td>
									</tr>
									@endif
									@if($listing->getAdditional->office_area_type)
									<tr>
										<td>Office Area Type</td>
										<td>{{$listing->getAdditional->office_area_type}}</td>
									</tr>
									@endif
									
									@if($listing->getAdditional->reason_for_selling)
									<tr>
										<td>Reason For Selling</td>
										<td>{{$listing->getAdditional->reason_for_selling}}</td>
									</tr>
									@endif
									@if($listing->getAdditional->support_training)
									<tr>
										<td>Support & Training</td>
										<td>{{$listing->getAdditional->support_training}}</td>
									</tr>
									@endif
									
									@if($listing->getAdditional->ff_and_d_included)
									<tr>
										<td>FF & D Included</td>
										<td>{{$listing->getAdditional->ff_and_d_included}}</td>
									</tr>
									@endif
									
									@if($listing->getAdditional->ebitda)
									<tr>
										<td>EDITDA</td>
										<td>{{$listing->getAdditional->ebitda}}</td>
									</tr>
									@endif
									
									
									@if($listing->getAdditional->financing)
									<tr>
										<td>Financing</td>
										<td>{{$listing->getAdditional->financing}}</td>
									</tr>
									@endif
									
									@if($listing->getAdditional->franchise)
									<tr>
										<td>Franchise</td>
										<td>{{$listing->getAdditional->franchise}}</td>
									</tr>
									@endif
									
									@if($listing->getAdditional->number_of_employee)
									<tr>
										<td>Number of Employee</td>
										<td>{{$listing->getAdditional->number_of_employee}}</td>
									</tr>
									@endif
									
									@if($listing->getAdditional->year_established)
									<tr>
										<td>Year of Establishment</td>
										<td>{{$listing->getAdditional->year_established}}</td>
									</tr>
									@endif
									
									
								</tbody>
							</table>
							
							
						</section>
					
	

							
					</div>
				
					<aside class="col-lg-4" id="sidebar">
						<div class="button-conatcts booking">
							<div class="btn-contact-list">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactSeller">
  Contact Seller
</button>
</div>
						
							<ul class="share-buttons">
							<li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
							<li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Share</a></li>
							<li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
						</ul>
						</div>
						
					</aside>
				</div>
				
		</div>
@endsection