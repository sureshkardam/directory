@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Category</li>
		
		
      </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Edit Category</h2>
			</div>
			
			<form action="{{route('admin.category.edit',['id'=>$category_data->id])}}" id="popForm" method="post" enctype="multipart/form-data">
                        @csrf
                   

                        
						<div class="form-group row">
                            <div class="form-group col-sm-6">
                                <label class="input-label img-categ">Image (Max image size 2MB)</label>
                                 @if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('File') as $errorMessage)
                                  <span class="label label-danger ">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
								
								<div class="store-logo">
								@if($category_data->image)
                                <img  id="placeholder" width="100px" src="{{url('/')}}/{{$category_data->image}}">
								@else
                                   
                                    <img width="150"  id="placeholder" src="https://i.imgur.com/CRQN5cK.jpg">
								@endif
									 <input type="file" id="img" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
						
						
						
						
                       
                        <div class="form-group row">

                        <div class="form-group col-sm-6">
						                  @if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('Name') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$category_data->name}}" required>
                            </div>

                            <div class="form-group col-sm-6">
							@if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('MetaDescription') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" value="{{$category_data->meta_description}}" required>
                            </div>                      
                        </div>
                              
                                <div class="form-group row">
                        <div class="form-group col-sm-6">
                       
                     @if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('SeoUrl') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                               
                                <label class="input-label">Seo Url<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{$category_data->seo_url}}" name="seo_url" required>
                            </div>

                                <div class="form-group col-sm-6">
                                        
                                <label class="input-label">Sort Order<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{$category_data->sort_order}}" name="sort_order">
                            </div>
                        </div>

                           


                            <div class="form-group row">
                           <div class="form-group col-sm-6">
                        @if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('MetaTitle') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                               
                                <label class="input-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{$category_data->meta_title}}" required>
                            </div>
                            
                                <div class="form-group col-sm-6">
                     
					 
					 
					 
					 
					 
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                   
                        <option @if($category_data->status == 1) selected @endif value="1" >Active</option>
                        <option @if($category_data->status == 0) selected @endif value="0">Inactive</option>
                                    
                                        
                                   
                                </select>
                                
                            </div>


                      
                 
                        </div>
                 

                      
                 
                         <div class="form-group row">
                         <div class="form-group col-sm-12">
                            
                                <label class="input-label">Parent Category</label>
                                <select name="parent_id" class="form-control" required>
                                    <option value="0">Select Parent Category</option>
                                    @foreach($categories as $category)
                                    
                                    <option value="{{$category->category_id}}" @if($category_data->parent_id==$category->category_id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                    
                                </select>
                                
                            </div>
                        </div>
                     
                 
                           <div class="form-group row">
                        <div class="form-group col-sm-12">
                             @if(Session::has('CategoryeditErrors'))
                                    @foreach(Session::get('CategoryeditErrors')->get('Description') as $errorMessage)
                                  <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                            <label for="first name" style="top:-20px" class="hello">Description
                           <span style="color: red">*</span>
                            </label>
                           <!--  <input type="text" class="form-control" id="description" value="{{$category_data->description}}" 
                                name="description" placeholder=""> -->
                                <textarea rows="4" cols="50" class="form-control" name="description">{{$category_data->description}}</textarea required>
                               

                        </div>
                        </div>

                        <div class="form-field-here blank_a">
                               <input type="checkbox" name="show_on_header" id="set-on-nav" value="1" 

                               @if($category_data->show_on_header )checked  value="1" @else value="0" @endif> 





                               <label for="set-on-nav">Show link on Header</label>
                                                            
                                                        </div>





                      <div class="form-group row">

                        <div class="col-sm-12">
                            <div class="form-group form-check col-sm-12 text-center">
                         
                           <button type="submit" class="btn blue">Update</button>
                        </div>
                        </div>
						</div>


                            

                    
                     </form>
			
			 
		</div>
		
		
		
	  </div>
	  <style>
	  .store-logo > img{
		  width:150px;
		  height:150px;
	  }
	  .imageThumb
	  {
		 width:150px;
		  height:150px; 
	  }
	  </style>
	  
	 <script>
       $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#img").on("change", function(e) {
		$(".pip").remove();
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\"></span>" +
            "</span>").insertAfter("#img");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
		  
		  $('#placeholder').css('display','none');
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
    </script>
@endsection