@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Manufacture</h2>
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
                                        <th>Sort Order</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                       
                                          <th>Edit</th>
                                         <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($manufactures as $manufacture)
                                  <tr>
                                    <td>{{$manufacture->name}}</td>
                                    <td>{{$manufacture->sort_order}}</td>
                                    
                                    <td> <img width="50px;" src="{{ url('/') }}/{{$manufacture->image}}"></td>
                                    <td>{{ $manufacture->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
									<a  data-toggle="modal" data-target="#exampleModal_{{$manufacture->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

<!-- Edit -->
                   


          <div class="modal fade" id="exampleModal_{{$manufacture->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Manufacture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.manufacture.edit',$manufacture->id) }}"  id="popForm" method="post" enctype="multipart/form-data">
            <div class="popper-box">
            <input type="hidden" value="{{$manufacture->id}}" name="id">


           <div class="form-field-here" style="margin-bottom: 10px;">
                                <label class="input-label">Image (150x150)</label>
                                <div class="store-logo manufac">
                                   <img width="100%" class="" src="{{ url('/') }}/{{$manufacture->image}}">
                              
                              <input type="file" id="manufacture-icon" name="image" src="https://via.placeholder.com/150"  class="" >
                                
                                </div>
                                
                            </div>
             


			<div class="form-field">
            <label for="name">Manufacture Name 
           <span style="color: red">*</span>
            </label>
            <input type="text" name="name" id="manufacture" value="{{$manufacture->name}}" class="form-control input-md">
            </div>



                 


   
			<div class="form-field">
            <label for="sort_order">Sort Order :</label>
            <input type="text" name="sort_order" id="sortorder" value="{{$manufacture->sort_order}}"  class="form-control input-md">
			</div>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <label for="status">Status :</label>
            <select class="custom-select" name="status" id="edit_status">
            <option value="1" selected>Active</option>
            <option value="0">Inactive</option>
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
                                    <td> <a href="{{route('admin.manufacture.delete',$manufacture->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    
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
        <h5 class="modal-title" id="exampleModalLabel">Add  Manufacture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>

      </div>
      <div class="modal-body">
    <form action="{{ route('admin.manufacture') }}" id="popForm" method="post" enctype="multipart/form-data">
      @csrf
      <div>
        <div class="popper-box">
		 <div class="form-field-here" style="margin-bottom: 10px;">
                                <label class="input-label">Image (150x150)</label>
                                <div class="store-logo manufac">
                                   
                               <img width="100%" class="" src="https://via.placeholder.com/150">
                              <input type="file" id="add-manufacture-icon" name="image" src="https://via.placeholder.com/150"  class="" >
                                
                                </div>
                                
                            </div>
           <label for="name">Manufacture Name 
           <span style="color: red">*</span>
            </label>
            <input type="text" name="name" id="addname" value="{{old('name')}}" placeholder="Enter Your Name" class="form-control input-md">
			</div>
      
      <div>
      <label for="attribute">Sort Order :</label>
      <input type="text" name="sort_order" id="sortorder" value="{{old('sort_order')}}" placeholder="213" class="form-control input-md">
      </div>
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

bootstrapValidate('#addname','required:Manufacture is required!');
bootstrapValidate('#sortorder','numeric:Enter Valid Sort Code!');
bootstrapValidate('#xyz','required:Enter Valid attribute Name!');
bootstrapValidate('#sortorder','numeric:Manufacture is required!');



@endsection