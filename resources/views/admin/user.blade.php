@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>User List</h2>
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

 @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
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
                                        <th>Customer Group</th>
                                     
                                        <th>Email</th>
										<!--  <th>Type</th> -->
										
                                        <th>Status</th>
                                       
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($user as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                              <td>{{App\Model\Admin\CustomerGroup::getName($user->group_id)}}</td>
                              
                                        <td>{{$user->email}}</td>
										
									<!-- 	<td>
										@if($user->user_type=='1')
											Seller
										
										@endif
										
										
										
										</td> -->
                                        <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>
                                       <td>
                                           <a href="" data-toggle="modal" data-target="#exampleModalPassword_{{$user->id}}"><i class="fa fa-key" aria-hidden="true"></i></a>

                    <!-- Password -->

             <div class="modal fade" id="exampleModalPassword_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.editpassword_user',$user->id)}}"  id="popForm" method="post">
            <div class="popper-box">
            <input type="hidden" value="{{$user->id}}" name="id">
           <label for="attribute">New Password 
            <span style="color: red">*</span>
                                 </label>
           <input type="password" name="password" id="pswd" placeholder="Enter Your Password"  class="form-control input-md">
            <label for="attribute">Confirm Password
              <span style="color: red">*</span>
                                 </label>
           <input type="password" name="password_confirmation" id="cnpswd" placeholder="Enter Confirm Password"   class="form-control input-md">
            
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <label for="attribute">Status :</label>
            <select class="custom-select" name="status" id="editstatus">
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
                                       
                                        <td>
                   <a href="{{route('admin.edit_user',$user->id)}}" data-toggle="modal" data-target="#exampleModal_{{$user->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>


          <!--   Edit  -->


          <div class="modal fade" id="exampleModal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.edit_user',$user->id)}}"  id="popForm" method="post">
            <div class="popper-box">
            <input type="hidden" value="{{$user->id}}" name="id">
            <label for="name">Name 
              <span style="color: red">*</span>
                                 </label>
            <input type="text" name="name" id="editname" value="{{$user->name}}" class="form-control input-md">
            <div class="form-field"> 
      <label for="dropdown">Customer Group 
        <span style="color: red"></span></label>
                            
      <select  class="form-control input-md" name="group_id">
              @foreach($customer_group as $group)
              <option @if($group->id == $user->group_id) selected @endif value="{{ $group->id }}">{{$group->name}}</option>
              @endforeach
            </select>
    </div>
            <label for="attribute">Email 
              <span style="color: red">*</span>
                                 </label>
           <input type="email" name="email" id="editemail" value="{{$user->email}}"  class="form-control input-md" disabled>
          <!--  <label for="attribute">Password :</label>
           <input type="password" name="password" id="editpassword"   class="form-control input-md"> -->
            
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <label for="attribute">Status :</label>
            <select class="custom-select" name="status" id="editstatus">
            <option value="1" @if($user->status=='1')selected @endif >Active</option>
            <option value="0" @if($user->status=='0')selected @endif >Inactive</option>
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
                                            <a href="{{route('admin.user.delete',$user->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>

      </div>
      <div class="modal-body">
    <form action="{{ route('admin.create_user') }}" id="popForm" method="post">
        <div class="popper-box">
          <div class="form-field">
           <label for="name">Name 
            <span style="color: red">*</span>
                                 </label>
            <input type="text" name="name" id="addname" placeholder="Enter Your Name" class="form-control input-md">
           </div>
           <div class="form-field"> 
      <label for="dropdown">Customer Group 
        <span style="color: red"></span></label>
      <select name="group_id" class="form-control input-md" >
       @foreach($customer_group as $group)

       <option value="{{$group->id}}">{{$group->name}}</option> 
       @endforeach
      </select>                           
      
    </div>
           <div class="form-field"> 
      <label for="attribute">Email 
        <span style="color: red">*</span>
                                 </label>
      <input type="text" name="email" id="addemail" placeholder="Enter Your Email" class="form-control input-md">
    </div>
    <div class="form-field">
       <label for="password">Password
        <span style="color: red">*</span>
                                 </label>
      <input type="password" name="password" id="addpassword" placeholder="Enter Your Password" class="form-control input-md">
    </div>
      <div class="form-field">
       <label for="attribute">Confirm-Password 
        <span style="color: red">*</span>
                                 </label>
      <input type="password" name="password" id="addconfirmpassword" placeholder="Enter Your Password" class="form-control input-md">
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

bootstrapValidate('#addname','required:Name Field is required!');
bootstrapValidate('#addemail','email:Enter valid E-mail account!');
bootstrapValidate('#addconfirmpassword','matches:#addpassword:The Confirm Password confirmation does not match.');
bootstrapValidate('#cnpswd','matches:#pswd:The Confirm Password confirmation does not match.');


@endsection