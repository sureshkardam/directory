@extends('admin.theme.layouts.app') 
@section('content')
  
  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create Category</li>
		
		
      </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Create Category</h2>
			</div>
			
			
			
			 <form action="{{ route('admin.category.create') }}" id="popForm" enctype="multipart/form-data" method="post">
                    @csrf
                    <div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                <label class="input-label">Image (Max image size 2MB)</label>

                                 @if(Session::has('CategoryCreateErrors'))
                                    @foreach(Session::get('CategoryCreateErrors')->get('File') as $errorMessage)
                                    <span class="label label-danger position-default">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                 
								<div class="store-logo">

                                    <input type="file" id="img" class="form-control" name="image">
                                    <img width="150" id="placeholder" src="https://i.imgur.com/CRQN5cK.jpg" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">

                                @if(Session::has('CategoryCreateErrors'))
                                    @foreach(Session::get('CategoryCreateErrors')->get('Name') as $errorMessage)
                                    <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{old('name')}}" name="name" required>
                            </div>
                            <div class="form-group col-sm-6">
                                 @if(Session::has('CategoryCreateErrors'))
                                    @foreach(Session::get('CategoryCreateErrors')->get('MetaDescription') as $errorMessage)
                                    <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Meta Description<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{old('meta_description')}}" name="meta_description" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                 @if(Session::has('CategoryCreateErrors'))
                                    @foreach(Session::get('CategoryCreateErrors')->get('SeoUrl') as $errorMessage)
                                    <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Seo Url<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{old('seo_url')}}" name="seo_url" required>
                            </div>

                            <div class="form-group col-sm-6">

                                <label class="input-label">Sort Order</label>
                                <input type="text" class="form-control" value="{{old('sort_order')}}" name="sort_order">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                 @if(Session::has('CategoryCreateErrors'))
                                    @foreach(Session::get('CategoryCreateErrors')->get('MetaTitle') as $errorMessage)
                                    <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Meta Title<span style="color: red">*</span></label>
                                <input type="text" value="{{old('meta_title')}}" class="form-control" name="meta_title" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-12">
                                <label class="input-label">Parent Category</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">Select Parent Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-12">
                                 @if(Session::has('CategoryCreateErrors'))
                                    @foreach(Session::get('CategoryCreateErrors')->get('Description') as $errorMessage)
                                    <span class="label label-danger">{{$errorMessage}}</span>
                                  @endforeach
                                    @endif
                                <label class="input-label">Description<span style="color: red">*</span></label>
                                <textarea rows="4" cols="50" class="form-control" name="description">{{old('description')}}</textarea required>
                            </div>
                        </div>
                     


                                              
                                              <div class="form-field-here blank_a">
                                              <input type="checkbox" name="show_on_header" id="set-on-nav-add" value="1"> 

                                                              

                                                           <label for="set-on-nav-add">Show link on Header</label>
                                                            
                                                        </div>

                        <div class="form-group row">
                            <div class="form-group form-check col-sm-12 text-center">
                               
                                <button type="submit" class="btn_1 medium">
Create Category</button>
                            </div>
                        </div>
                </form>
			
			
			
		</div>
		
		
		
	  </div>
  
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