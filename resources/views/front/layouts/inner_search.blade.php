<div id="results">
		   <div class="container">
			   <div class="row">
				   <div class="col-lg-3 col-md-4 col-10">
					   
					   @if($listings)
					   <h4><strong id="result_count">{{sizeof($listings)}}</strong> result for listing</h4>
						@endif
				   </div>
				   <div class="col-lg-9 col-md-8 col-2">
					   <a href="#0" class="side_panel btn_search_mobile"></a> 
						<form method="post" action="{{url('filter/listing')}}">
						@csrf
						<div class="row no-gutters custom-search-input-2 inner">
							<div class="col-lg-5">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="What are you looking for..." name="filter_title">
									<i class="icon_search"></i>
								</div>
							</div>
							<div class="col-lg-3">
								<select class="wide" name="filter_location[]">
									<option value="" >All Location</option>	
							  
                               @foreach(\App\Model\Admin\State::getCanadaStates() as $state)
						   
						   <option value="{{$state->id}}">{{$state->name}}</option>
							@endforeach		
								</select>
								<i class="icon_pin_alt"></i>
							</div>
							<div class="col-lg-3">
								<select class="wide" name="filter_category[]">
									<option value="">All Categories</option>	
							   @if(!empty($all_cat))
                               @foreach($all_cat as $category)
						   
						   <option value="{{$category->id}}">{{$category->name}}</option>
									@if(!empty($category->children))
										@foreach($category->children as $child_cat)
												{{$child_cat->name}}
												<option value="{{$child_cat->id}}">--{{$child_cat->name}}</option>
										@endforeach
									@endif
									
									
								@endforeach
								@endif	
									
								
								</select>
							</div>
							<div class="col-lg-1">
								<input type="submit">
							</div>
						</div>
						
						</form>
				   </div>
			   </div>
			 
		   </div>
		 
	   	</div>
	   