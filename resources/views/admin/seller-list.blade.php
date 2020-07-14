@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Seller List</h2>
      </div>
      
                   <div  class="add-button">
           <a href="{{route('admin.seller.create')}}" ><i class="fa fa-plus" ></i> Add New</a>
           
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
                                     
                                        <th>Email</th>
										 
										
                                        <th>Status</th>
                                       
                   
                    <th>Edit</th>
                    <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($user as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                              
                                        <td>{{$user->email}}</td>
                                        
										
										
                                        <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>
                                      
                                        <td>
                  
<a class="action-dash" href="{{route('admin.seller.edit',$user->id)}}" ><i class="fa fa-pencil" aria-hidden="true"></i>

          
                                        </td>
                     <td>
                                            
											<a class="action-dash" href="{{route('admin.seller.delete',$user->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
  
  
  
@endsection

