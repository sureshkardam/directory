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
			
			
			
			 <form action="{{ route('admin.category.add') }}" id="popForm" enctype="multipart/form-data" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-field-here">
                            <label class="input-label">Image (150x150)</label>
                                <div class="store-logo">
                                <input type="file" id="img" class="form-control" name="image">
                                    <img src="https://via.placeholder.com/150">
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                       
                            <div class="form-field-here">
                                <label class="input-label">Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{old('name')}}" name="name">
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Meta Description<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{old('meta_description')}}" name="meta_description">
                            </div>

                         
                        </div>


                        <div class="col-sm-6">
                               <div class="form-field-here">
                                <label class="input-label">Meta Title<span style="color: red">*</span></label>
                                <input type="text" value="{{old('meta_title')}}" class="form-control" name="meta_title">
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                                
                            </div>                           
                         </div>
                         <div class="col-sm-12">
                            <div class="form-field-here">
                                <label class="input-label">Parent Category</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">Select Parent Category</option>
                                    
                                    @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
                                    
                                </select>                                
                            </div>   
                        </div>         
                        <div class="col-sm-12">
                            <div class="form-field-here">
                                <label class="input-label">Description<span style="color: red">*</span></label>
                                <textarea rows="4" cols="50" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                      

                        <div class="col-sm-12">
                            <div class="form-field-here text-center" style="margin-top: 20px">
                                <button type="submit" class="btn_1 medium">Save Category</button>
                                
                            </div>
                        </div>

                    </div>
                     </form>
			
			
			
		</div>
		
		
		
	  </div>
  

@endsection