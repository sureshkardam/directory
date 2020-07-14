<nav id="menu" class="main-menu">
		    <ul>
		        
				
				
				
				
				 @if(!empty($all_cat))
                               @foreach($all_cat as $category)
				
				<li><span><a href="{{url('category',$category->seo_url)}}">{{$category->name}} </a></span>
		            
					@if(!empty($category->children))
					<ul>
		                @foreach($category->children as $child_cat)
						<li><a href="{{url('category',$child_cat->seo_url)}}">{{$child_cat->name}} ({{\App\Model\Admin\Category::getListingsCount($child_cat->seo_url)}})</a></li>
		                @endforeach
		            </ul>
					@endif
		        </li>
				@endforeach
				@endif
				
		    </ul>
		</nav>