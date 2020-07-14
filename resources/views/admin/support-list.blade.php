@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Support List</h2>
      </div>
      
                  <!-- <div  class="add-button">
           <a href="{{route('admin.product.add')}}"  ><i class="fa fa-plus" ></i> Add New</a>
           
           </div>-->
           
               
        
                
                  
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
                        
                            
							
							<table id="example" class="display table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							 @foreach($supports as $support)
                                <tr>
                                    <td>{{App\User::getName($support->user_id)}}</td>
                                    <td>{{$support->subject}}</td>
                                    <td>{{App\Model\Admin\SupportCategory::getName($support->category)}}</td>
									
                                    <td>{{str_limit($support->description, 25 )}}</td>
                                   <!--  <td>{{$support->created_at}}</td> -->
                                   <td>{{date('M\. d\, Y', strtotime($support->created_at))}}</td>
                                    <td>
									<a class="action-dash" href="{{route('admin.support.edit',['id'=>$support->id])}}" ><i class="fa fa-eye" aria-hidden="true"></i>
                                   
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
