@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Attribute</h2>
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
        <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
            @endif






                        <div class="edit-account">
                        
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Attribute Group</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                       
                    <th>Edit</th>
                    <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($attribute as $attribute)
                                    <tr>
                                        <td>{{$attribute->name}}</td>
                                        <td>{{App\Model\Admin\AttributeGroup::getName($attribute->attribute_group_id)}}</td>
                                        <td>{{$attribute->sort_order}}</td>
                                        <td>{{ $attribute->status ? 'Active' : 'Inactive' }}</td>
                                       
                                       
                                        <td>
                   <a href="" data-toggle="modal" data-target="#exampleModal_{{$attribute->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

         <!-- Edit -->

          <div class="modal fade" id="exampleModal_{{$attribute->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Attribute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.attribute.edit') }}"  id="popForm" method="post">
            <div class="popper-box">
            <input type="hidden" value="{{$attribute->id}}" name="id">
			<div class="form-field">
            <label for="name">Attribute Name 
            <span style="color: red">*</span>
          </label>
            <input type="text" name="name" id="editattributename" value="{{$attribute->name}}" class="form-control input-md">
            </div>
		   <label for="attribute">Attribute Group 
       <span style="color: red">*</span>
        </label>
            <select  class="form-control input-md" name="attribute_group_id">
              @foreach($attribute_group as $group)
              <option @if($group->id == $attribute->attribute_group_id) selected @endif value="{{ $group->id }}">{{$group->name}}</option>
              @endforeach
            </select>
			<div class="form-field">
            <label for="attribute">Sort Order :</label>
            <input type="text" name="sort_order" id="editsort" value="{{$attribute->sort_order}}"  class="form-control input-md">
			</div>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <label for="attribute">Status :</label>
            <select class="custom-select" name="status" id="edit_status">
            <option @if($attribute->status == 1) selected @endif value="1">Active</option>
            <option @if($attribute->status == 0) selected @endif value="0">Inactive</option>
        </select>
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
                                            <a href="{{route('admin.attribute.delete',$attribute->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Attribute</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>

      </div>
      <div class="modal-body">
    <form action="{{ route('admin.attribute.create') }}" id="popForm" method="post">
        <div class="popper-box">
		<div class="form-field">
           <label for="name">Name 
            <span style="color: red">*</span>
                                 </label>
            <input type="text" name="name" value="{{old('name')}}" id="addName" placeholder="Enter Your Name" class="form-control input-md">
			</div>
            <label for="attribute">Attribute Group
              <span style="color: red">*</span>
                                 </label>
          <select  class="form-control input-md" name="attribute_group_id" >
        @foreach($attribute_group as $group)
        <option value="{{$group->id}}">{{$group->name}}</option>
        @endforeach
      </select>
	  <div class="form-field">
      <label for="attribute">Sort Order :</label>
      <input type="text" name="sort_order" value="{{old('sort_order')}}" id="sort" placeholder="213" class="form-control input-md">
	  </div>
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      <label for="attribute">Status :</label>
       <select class="custom-select" name="status" id="status">
        <option value="1" selected>Active</option>
        <option value="0">Inactive</option>
      </select>
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
bootstrapValidate('#editattributename','required:Name Field Is Required!');
bootstrapValidate('#editsort','numeric:Please Check Your Sort Order!');




@endsection