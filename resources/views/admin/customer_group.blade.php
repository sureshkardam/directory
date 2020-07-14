@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Customer Group</h2>
      </div>
      
                   <div  class="add-button">
           <a href="" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus" ></i> Add New</a>
           
           </div>
          
                  
        
                
                  
                    <div class="today-orders-div">
                      
                        <div class="edit-account">
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
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                       
                    <th>Edit</th>
                    <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($customer_group as $group)
                                    <tr>
                                        <td>{{$group->name}}</td>
                                        <td>{{$group->description}}</td>
                                        <td>{{$group->status ? 'Active' : 'Inactive' }}</td>
                                       
                                       
                                        <td>
                   <a href="" data-toggle="modal" data-target="#exampleModal_{{$group->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>


        <!-- Edit -->
          <div class="modal fade" id="exampleModal_{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Customer Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.customer_group.edit')}}"  id="popForm" method="post">
            <div class="popper-box">
            <input type="hidden" value="{{$group->id}}" name="id">
			<div class="form-field">
            <label for="name">Name 
              <span style="color: red">*</span>
                                 </label>
            <input type="text" name="name" id="editname" value="{{$group->name}}" class="form-control input-md">
           </div>
		   <div class="form-field">
            <label for="customer_group">Description 
              <span style="color: red">*</span>
                                 </label>
            <input type="text" name="description" id="editdescription" value="{{$group->description}}"  class="form-control input-md">
			</div>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <label for="customer_group">Status :</label>
            <select class="custom-select" name="status" id="edit_status">
            <option value="1" @if($group->status=='1')selected @endif >Active</option>
            <option value="0" @if($group->status=='0')selected @endif >Inactive</option>
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
                                            <a href="{{route('admin.customer_group.delete',$group->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Customer Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>

      </div>
      <div class="modal-body">
    <form action="{{ route('admin.customer_group.create') }}" id="popForm" method="post">
        <div class="popper-box">
		<div class="form-field">
           <label for="name">Name <span style="color: red">*</span>
                                 </label>
            <input type="text" value="{{old('name')}}" name="name" id="addname" placeholder="Name" class="form-control input-md">
			</div>
			<div class="form-field">
      <label for="customer">Description <span style="color: red">*</span>
                                 </label>
      <input type="text" name="description" value="{{old('description')}}" id="adddescription" placeholder="Description" class="form-control input-md">
	  </div>
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      <label for="customer">Status :</label>
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

bootstrapValidate('#addname','required:Name Field Is Required');
bootstrapValidate('#adddescription','required:Description Field Is Required');
bootstrapValidate('#editname','required:Name Field Is Required');
bootstrapValidate('#editdescription','required:Description Field Is Required');


@endsection