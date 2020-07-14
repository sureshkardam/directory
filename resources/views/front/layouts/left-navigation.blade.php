	<aside class="col-lg-3" id="sidebar">
					<div id="filters_col">
						<a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
						<div class="collapse show" id="collapseFilters">
							
							@if(sizeof($subCategory) > 0)
								
							
							
							<div class="filter_type">
								<h6>Sub Category</h6>
								<ul>
									
									@foreach($subCategory as $sub)
									<li>
										<label class="container_check">{{$sub->name}} 
										  <input class="filter_data" type="checkbox" name="filter_category[]" data-id="{{$sub->id}}" value="{{$sub->id}}">
										  <span class="checkmark"></span>
										</label>
									</li>
									@endforeach
									
								</ul>
							</div>
							@endif
							
							
							
							
							<div class="filter_type">
								<h6>Location</h6>
								<ul>
									
									@foreach(\App\Model\Admin\State::getCanadaStates() as $location)
									<li>
										<label class="container_check">{{$location->name}} 
										  <input class="filter_data" type="checkbox" name="filter_location[]" data-id="{{$location->id}}" value="{{$location->id}}">
										  <span class="checkmark"></span>
										</label>
									</li>
									@endforeach
									
								</ul>
							</div>
							
						</div>
						
					</div>
					
				</aside>
				