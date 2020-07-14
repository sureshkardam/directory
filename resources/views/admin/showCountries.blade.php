@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Countries</h2>
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
                                        <th>Code</th>
                                        <th>Phone Code</th>
                                        <th>Status</th>
                                       
                    <th>Edit</th>
                    <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($countries as $country)
				<tr>
                                        <td>{{$country->name}}</td>
                                        <td>{{$country->code}}</td>
                                       <td>{{$country->phonecode}}</td>
                                        <td>{{ $country->status ? 'Active' : 'Inactive' }}</td>
                                       
                                       
                                        <td>
                   <a href="" data-toggle="modal" data-target="#exampleModal_{{$country->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <!-- Edit -->
          <div class="modal fade" id="exampleModal_{{$country->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.country.edit') }}"  id="popForm" method="post">
            <div class="popper-box">
            <input type="hidden" value="{{$country->id}}" name="id">
            <div>
            <label for="name">Country Name :</label>
            <input type="text" name="country_name" id="editCountryname" value="{{$country->name}}" class="form-control input-md">
          </div>
          <div>
            <label for="country">Country Code :</label>
            <input type="text" name="country_code" id="editCountrycode"  value="{{$country->code}}" class="form-control input-md">
          </div>
          <div>
            <label for="country">Phone Code :</label>
            <input type="text" name="phone_code" id="editPhonecode" value="{{$country->phonecode}}"  class="form-control input-md">
          </div>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <label for="country">Status :</label>
            <select class="custom-select" name="status" id="edit_status">
            <option value="1" @if($country->status=='1')selected @endif >Active</option>
            <option value="0" @if($country->status=='0')selected @endif >Inactive</option>
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
                                            <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('admin.country.delete',$country->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>

      </div>
      <div class="modal-body">
    <form action="{{ route('admin.country.create') }}" id="popForm" method="post">
        <div class="popper-box">
          <div>
           <label for="name">Country Name<span style="color: red">*</span> </label>
            <input type="text" name="name" id="addName" placeholder="Country Name" class="form-control input-md">
          </div>
          <div>
            <label for="country">Country Code <span style="color: red">*</span></label>
      <input type="text" name="code" id="addCountry" placeholder="Country Code" class="form-control input-md">
    </div>
    <div>
      <label for="country">Phone Code <span style="color: red">*</span></label>
      <input type="text" name="phonecode" id="addPhonecode" placeholder="Phone Code" class="form-control input-md">
    </div>
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      <label for="country">Status :</label>
       <select class="custom-select" name="status" id="status">
        <option value="1" selected>Active</option>
        <option value="0">Inactive</option>
      </select>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
       <input  type="submit" value="Save" name="submit">
      </div>
    </form>       
      </div>
    </div>
  </div>
</div>
 
@endsection

@section('script')

bootstrapValidate('#addName','required:Country Name required!');
bootstrapValidate('#addCountry','required:Country Code required!');
bootstrapValidate('#addPhonecode','numeric:Enter Valid Phone Code!');
bootstrapValidate('#editCountryname','required:Please Check Your Country Name!');
bootstrapValidate('#editCountrycode','required:Please Check Your Country Code!');
bootstrapValidate('#editPhonecode','numeric:Please Check Your Phone Code!');


@endsection