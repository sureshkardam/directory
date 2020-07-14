<div id="search_mobile">
			<a href="#" class="side_panel"><i class="icon_close"></i></a>
			<form method="post" action="{{url('filter/listing')}}">
						@csrf
			<div class="custom-search-input-2">
				<div class="form-group">
					<input class="form-control" type="text" placeholder="What are you looking.." name="filter_title">
					<i class="icon_search"></i>
				</div>
				<div class="form-group">
					<select class="wide" name="filter_location[]">
									<option value="" >All Location</option>	
							  
                               @foreach(\App\Model\Admin\State::getCanadaStates() as $state)
						   
						   <option value="{{$state->id}}">{{$state->name}}</option>
							@endforeach		
								</select>
					<i class="icon_pin_alt"></i>
				</div>
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
				<input type="submit" name="Search">
			</div>
			</form>
		</div>