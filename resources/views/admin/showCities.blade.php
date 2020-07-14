@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
				
				<div class="title-heading">
					<h2>Cities</h2>
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
					<div class="seach-filter-tab">
					 <form method="post" action="{{route('admin.city.list')}}">
					 
					 @csrf
					
					 <input type="search" name="keyword" placeholder="Enter City Name. .">
					
					   <input type="submit" class="btt" value="Filter">
					
					</form>
					</div>
                      
                        <div class="edit-account">
                            <table class="table dispay my-tab" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>State</th>
										
                                       
                                        <th>Status</th>
                                       
										<th>Edit</th>
										<th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                
								
								
								<tbody>
                                @foreach ($cities as $city)
								<tr>
                                        <td>{{$city->name}}</td>
                                        <td>{{App\Model\Admin\State::getName($city->state_id)}}</td>
                                     
                                        <td>{{ $city->status ? 'Active' : 'Inactive' }}</td>
                                       
                                       
                                         <td>
                   <a href="" data-toggle="modal" data-target="#exampleModal_{{$city->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
  <!-- Edit -->
                    <div class="modal fade" id="exampleModal_{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit city</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.city.edit') }}"   id="popForm" method="post">
                        <div class="popper-box">
            <input type="hidden" value="{{$city->id}}" name="id">
                        <label for="name">city Name :</label>
                        <input type="text" name="name" id="city" value="{{$city->name}}" class="form-control input-md">
                        <label for="attribute">Select State</label>
          <select  class="form-control input-md" name="state_id" >
        @foreach($states as $state)
        <option @if($state->id == $city->state_id) @endif value="{{$state->id}}">{{$state->name}}</option>
        @endforeach
      </select>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <label for="city">Status :</label>
                        <select class="custom-select" name="status" id="edit_status">
                        <option value="1" @if($city->status=='1')selected @endif >Active</option>
                        <option value="0" @if($city->status=='0')selected @endif >Inactive</option>
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
                                            <a href="{{route('admin.city.delete',$city->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                   @endforeach   
                                </tbody>
                            </table>
							<div class="set-pagina">{{ $cities->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<!-- Add -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>

      </div>
      <div class="modal-body">
    <form action="{{ route('admin.city.create') }}" id="popForm" method="post">
        <div class="popper-box">
           <label for="name">City Name :</label>
            <input type="text" name="name" id="addName" placeholder="City Name" class="form-control input-md">
            <label for="attribute">Select state</label>
          <select  class="form-control input-md" name="state_id" >
        @foreach($states as $state)
        <option value="{{$state->id}}">{{$state->name}}</option>
        @endforeach
      </select>
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      <label for="state">Status :</label>
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