@extends('admin.theme.layouts.app') 
@section('content')
  

                   
           @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif
                  
      
  
   <section class="content-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Create Page</h2>
                <div class="row edit-account">
                    <form action="{{route('admin.create_information')}}" method="post">
                        <div class="form-group col-sm-12">
                            <label for="title">Title
                            <span style="color: red">*</span>
                            </label> 
                            <input type="promotion-code" id="title" placeholder="" class="form-control" name="title"
                            value="{{ old('title') }}">
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="seo_url">Seo Url
                            <span style="color: red">*</span>
                            </label>
                          <input type="promotion-code" id="seo" placeholder="" class="form-control" name="seo_url" 
                          value="{{ old('seo_url') }}" >
                    </div>
                        
                        <div class="form-group col-sm-12">
                            <label for="meta_title">Meta Title</label>
                            <span style="color: red">*</span>
                            </label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder=""
                            value="{{ old('meta_title') }}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="meta_description">Meta Description
                                <span style="color: red">*</span>
                            </label>
                            <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder=""
                            value="{{ old('meta_description') }}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="description">Description
                                <span style="color: red">*</span>
                            </label>
                          <!--  <input type="textarea" class="form-control" id="" name="description"  placeholder="please enter "> -->
                           <textarea class="form-control"  id="description" name="description" >{{ old('description') }}</textarea>
                            

                        </div>
                        
                       <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group col-sm-12">
                            <label for="status">Status</label>
                            <select type="text" name="status" class="form-control select-form">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group form-check col-sm-6">
                           <input type="submit" name="submit" class="btn blue" value="Save">
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

  
    
    
     
    
  <script type="text/javascript"></script>
 <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                            <script>
                        CKEDITOR.replace( 'description' );
                </script> 


 
@endsection

@section('script')

bootstrapValidate('#title','required:Title is Required');
 <!-- bootstrapValidate('#seo','url:Enter Valid URL');  -->
bootstrapValidate('#addattribute','alpha:Enter Valid attribute Code!');

@endsection
