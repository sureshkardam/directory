@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Filter</h2>
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
                      
                        <div class="edit-account">
                        
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Group Name</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                       
                    <th>Edit</th>
                    <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($filter as $filter)
                                    <tr>
                                        <td>{{$filter->name}}</td>
										
                                        <td>{{App\Model\Admin\Filter::getName($filter->filter_group_id)}}</td>
                                        <td>{{$filter->sort_order}}</td>
                                        <td>{{ $filter->status ? 'Active' : 'Inactive' }}</td>
                                       
                                       
                                        <td>
                   <a href="" data-toggle="modal" data-target="#exampleModal_{{$filter->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>


          <!-- Edit -->


          <div class="modal fade" id="exampleModal_{{$filter->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.filter.edit') }}"  id="popForm" method="post">
            <div class="popper-box">
            <input type="hidden" value="{{$filter->id}}" name="id">
			<div class="form-field">
            <label for="name">filter Name
              <span style="color: red">*</span>
                                 </label>
            <input type="text" name="name" id="editname" value="{{$filter->name}}" class="form-control input-md">
            </div>
		   <label for="filter">filter Group 
        <span style="color: red">*</span>
                                 </label>
            <select class="form-control input-md" name="filter_group_id" >
        @foreach($group_filter as $group)
        <option @if($group->id == $filter->filter_group_id )   selected @endif value="{{$group->id}}">{{$group->name}}</option>
        @endforeach
      </select>
	  <div class="form-field">
            <label for="filter">Sort Order :</label>
            <input type="text" name="sort_order" id="editsort" value="{{$filter->sort_order}}"  class="form-control input-md">
			</div>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <label for="filter">Status :</label>
            <select class="custom-select" name="status" id="edit_status">
            <option @if($filter->status == 1) selected @endif value="1" selected>Active</option>
            <option @if($filter->status == 0) selected @endif value="0">Inactive</option>
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
                                            <a href="{{route('admin.filter.delete',$filter->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>

      </div>
      <div class="modal-body">
    <form action="{{ route('admin.filter.create') }}" id="popForm" method="post">
        <div class="popper-box">
		<div class="form-field">
           <label for="name">Name 
            <span style="color: red">*</span>
                                 </label>
            <input type="text" name="name" id="addname" value="{{old('name')}}" placeholder="Enter Your Name" class="form-control input-md">
			</div>
            <label for="filter">filter Group 
              <span style="color: red">*</span>
                                 </label>
             <select class="form-control input-md" value="{{old('filter_group_id')}}" name="filter_group_id" >
        @foreach($group_filter as $group)
        <option value="{{$group->id}}">{{$group->name}}</option>
        @endforeach
      </select>
	 <div class="form-field">
      <label for="filter">Sort Order :</label>
      <input type="text" name="sort_order" value="{{old('sort_order')}}" id="addsort" placeholder="213" class="form-control input-md">
	  </div>	
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      <label for="filter">Status :</label>
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
bootstrapValidate('#addsort','numeric:Enter Valid Sort Order');
bootstrapValidate('#editname','required:Name Field Is Required');
bootstrapValidate('#editsort','numeric:Please Check Your Sort Order');


@endsection