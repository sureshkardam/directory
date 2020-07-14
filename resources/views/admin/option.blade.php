@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Options</h2>
      </div>
      
                   <div  class="add-button">
           <a href="{{route('admin.option.create')}}" ><i class="fa fa-plus" ></i> Add New</a>
           
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
                                        <th>Option Name</th>
                                        <th>Sort Order</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($options as $option)
                                    <tr>
                                        <td>{{$option->name}}</td>
                                        <td>{{$option->sort_order}}</td>
                                       
                                        <td>
										<a href="{{route('admin.option.edit',$option->id)}}"  <i class="fa fa-pencil" aria-hidden="true"></i></a>
                      
                                        </td>
										<td>
                                            <a href="{{route('admin.option.delete',$option->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

