@extends('front.layouts.app') 
@section('content')

@include('front.layouts.inner_search')

<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
</div>
		


<div class="container margin_60_35">
			<div class="row">
			
			<!--@include('front.layouts.left-navigation')-->
			
			<div class="col-lg-12" id="ajax-listing">
					
					
					@include('front.list-data') 
			
				</div>

</div>
</div>






@endsection