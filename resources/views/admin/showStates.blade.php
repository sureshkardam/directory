@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
				
				<div class="title-heading">
					<h2>States</h2>
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
					 <form method="post" action="{{route('admin.state.list')}}">
					 
					 @csrf
					 <input type="search" name="keyword" placeholder="Enter State Name. .">
					 <input type="submit" class="btt" value="Filter">
					 
					
					</form>
					</div>
					
					
					
					
					
                      
                        <div class="edit-account">
                            <table class="table dispay my-tab" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Country</th>
                                       
                                        <th>Status</th>
                                       
										<th>Edit</th>
										<th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                
								
								
								<tbody>
                                @foreach ($states as $state)
								<tr>
                                        <td>{{$state->name}}</td>
                                        <td>{{App\Model\Admin\Country::getName($state->country_id)}}</td>
                                     
                                        <td>{{ $state->status ? 'Active' : 'Inactive' }}</td>
                                       
                                       
                                         <td>
                   <a href="" data-toggle="modal" data-target="#exampleModal_{{$state->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<!-- EDIT -->
                    <div class="modal fade" id="exampleModal_{{$state->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit state</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.state.edit') }}"   id="popForm" method="post">
                        <div class="popper-box">
            <input type="hidden" value="{{$state->id}}" name="id">
                        <label for="name">State Name :</label>
                        <input type="text" name="name" id="state" value="{{$state->name}}" class="form-control input-md">
                        <label for="attribute">Select Country</label>
          <select  class="form-control input-md" name="country_id" >
        @foreach($countries as $country)
        <option @if($state->country_id == $country->id) @endif value="{{$country->id}}">{{$country->name}}</option>
        @endforeach
      </select>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <label for="state">Status :</label>
                        <select class="custom-select" name="status" id="edit_status">
                        <option value="1" @if($state->status=='1')selected @endif >Active</option>
                        <option value="0" @if($state->status=='0')selected @endif >Inactive</option>
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
                                            <a href="{{route('admin.state.delete',$state->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                   @endforeach   
                                </tbody>
                            </table>
							
							
							<div class="set-pagina">{{ $states->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
<!--Add -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add States</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>

      </div>
      <div class="modal-body">
    <form action="{{ route('admin.state.create') }}" id="popForm" method="post">
        <div class="popper-box">
           <label for="name">State Name :</label>
            <input type="text" name="name" id="addName" placeholder="State Name" class="form-control input-md">
            <label for="attribute">Select Country</label>
          <select  class="form-control input-md" name="country_id" >
        @foreach($countries as $country)
        <option value="{{$country->id}}">{{$country->name}}</option>
        @endforeach
      </select>
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      <label for="country">Status :</label>
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