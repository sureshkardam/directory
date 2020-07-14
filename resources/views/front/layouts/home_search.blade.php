<section class="hero_single version_4">
			<div class="wrapper">
				<div class="container">
					<h3>Search Businesses for Sale around Canada!</h3>
					
					<form method="post" action="{{route('listing.filter')}}">
						@csrf
						<div class="row no-gutters custom-search-input-2">
							<div class="col-lg-4">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="What are you looking for..." name="filter_title">
									<i class="icon_search"></i>
								</div>
							</div>
							<div class="col-lg-3">
									<select class="wide" name="filter_location[]">
									<option value="">All Location</option>	
							  
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
							<div class="col-lg-2">
								<input type="submit" value="Search">
							</div>
						</div>
						
					</form>
					
				</div>
			</div>
		</section>
		