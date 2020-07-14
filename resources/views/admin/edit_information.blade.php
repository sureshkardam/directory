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
                <h2>Edit Page</h2>
                <div class="row edit-account">
                    <form action="{{route('admin.edit_information',$information->id)}}" method="post">
                  
                        <div class="form-group col-sm-12">
                        
                            <label for="title">Title<span style="color: red">*</span>
                            </label>
                            <input type="text" value="{{$information->title}}" id="title"  class="form-control" name="title" id="code">
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="seo_url">Seo url<span style="color: red">*</span>
                            </label>
                          <input type="text" id="url" value="{{$information->seo_url}}" placeholder="" class="form-control" name="seo_url" >
                          
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="meta_title">Meta Title<span style="color: red">*</span>
                            </label>
                            <input type="text" class="form-control" id="amount" value="{{$information->meta_title}}" placeholder="" name="meta_title" >
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="meta_description">Meta Description<span style="color: red">*</span>
                            </label>
                            <input type="text" class="form-control" id="minimum" name="meta_description"  placeholder="" value="{{$information->meta_description}}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="description">Description<span style="color: red">*</span>
                            </label>
                            <!-- <input type="textarea" class="form-control" id="description" value="{{$information->description}}" 
                                name="description" placeholder=""> -->
                                <textarea class="form-control"  id="description" name="description">{{$information->description}}</textarea>

                        </div>
                      
                      
                        
                       
                       <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group col-sm-12">
                            <label for="email">Status</label>
                            <select type="text" name="status" class="form-control select-form">
            <option @if($information->status == 1) selected @endif  value="1" >Active</option>
            <option  @if($information->status == 0) selected @endif value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group form-check col-sm-6">
                           <input type="submit" name="submit" class="btn blue" value="Update">
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('script')

 bootstrapValidate('#url','url:Enter Valid URL'); 
bootstrapValidate('#title','alpha:Enter Valid attribute Code!');

<script type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                            <script>
                        CKEDITOR.replace( 'description' );
                </script>

@endsection
