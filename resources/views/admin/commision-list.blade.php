@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Commission List</h2>
      </div>
      
                   <div  class="add-button">
           <a href="{{route('admin.commision.create')}}" ><i class="fa fa-plus" ></i> Add New</a>
           
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
                                        <th>Country </th>
                                        <th>State </th>
                                        <th>Category</th>
                                        <th>Percentage</th>
                                        <th>Status</th>
                                     
										 
										
                                       
                   
                    <th>Edit</th>
                    <th>Delete</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($commision as $commision)
                                    <tr>
                            <td>{{App\Model\Admin\Country::getName($commision->country_id)}}</td>
                           <td>{{App\Model\Admin\State::getName($commision->state_id)}}</td>
                         <td>{{App\Model\Admin\Category::getName($commision->category_id)}}</td>
                                        <td>{{$commision->percentage}}</td>
										
										
                                        <td>{{ $commision->status ? 'Active' : 'Inactive' }}</td>
                                      
                                        <td>
                  
<a class="action-dash" href="{{route('admin.edit-commision',$commision->id)}}" ><i class="fa fa-pencil" aria-hidden="true"></i>

          
                                        </td>
                     <td>
                                            
											<a class="action-dash" href="{{route('admin.commision-delete',$commision->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

