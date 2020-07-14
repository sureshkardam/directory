@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Master Category Commision</h2>
      </div>
      
                   <div  class="add-button">
           <a href="" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus" ></i> Add New</a>
           
           </div>

                  
        
                
                  
                    <div class="today-orders-div">
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

@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
        @endif
       @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert"></button>
          <strong>{{ $message }}</strong>
        </div>
            @endif






                        <div class="edit-account">
                        
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Percentage</th>
                                       
                            
                    <th>Edit</th>
                    <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($masterCommision as $master)
                                    <tr>
                                        <td>{{App\Model\Admin\Category::getName($master->category_id)}}</td>
                                        
                                        <td>{{$master->percentage}}</td>
                                       
                                       
                                       
                                        <td>
                   <a href="{{route('admin.mastercommission.edit',$master->id)}}" data-toggle="modal" data-target="#exampleModal_{{$master->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

         <!-- Edit -->

          <div class="modal fade" id="exampleModal_{{$master->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Category Commision</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.mastercommission.edit')}}"  id="popForm" method="post">
            <div class="popper-box">
            <input type="hidden" value="{{$master->id}}" name="id">
			<div class="form-field">
            <label for="name">Category  <span style="color: red">*</span> </label>
            <select class="form-control input-md" name="category_id"> 
       

         @foreach($categories as $cat)
                                    <option value="{{$cat->category_id}}" @if($cat->category_id==$master->category_id) selected @endif>{{$cat->name}}</option>
                                    @endforeach



         </select>
           
            </div>
		   <label for="master">Percentage
       <span style="color: red">*</span>
        </label>
           <input type="text" name="percentage" id="percentage" value="{{$master->percentage}}"  class="form-control input-md">
			
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
       <input type="submit" value="Update">

      </div>

    
    </form>       
      </div>
      
    </div>
  </div>
</div>
                      
                                        </td>
                     <td>
                                            <a href="{{route('admin.mastercommission.delete',$master->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                 @endforeach  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  
  <!-- Add new Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category Commision</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>

      </div>
      <div class="modal-body">
    <form action="{{route('admin.mastercommission.create')}}" id="popForm" method="post">
        <div class="popper-box">
		<div class="form-field">
<label for="name">Category <span style="color: red">*</span>    </label>                
            <select name="category_id" class="form-control input-md"> 
              
              @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
            </select>
			</div>
            <label for="master">Percentage <span style="color: red">*</span></label>
        <input type="text" name="percentage" value="{{old('percentage')}}" id="sort" placeholder="%" class="form-control input-md">      
                                 
              
      </select>
	  
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
     
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
       <input type="submit" value="Save" name="submit">
      </div>
    </form>       
      </div>
    </div>
  </div>
</div>
 
@endsection

@section('script')

bootstrapValidate('#addName','required:Name Field Is Required!');
bootstrapValidate('#sort','numeric:Enter Valid Sort Order!');
bootstrapValidate('#editmastername','required:Name Field Is Required!');
bootstrapValidate('#editsort','numeric:Please Check Your Sort Order!');




@endsection