@extends('admin.theme.layouts.app') 
@section('content')

<style type="text/css">
    input[type="file"] {
    display: block;
  }
  .imageThumb {
    max-height: 75px;
    border: 2px solid;
    padding: 1px;
    cursor: pointer;
  }
  .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
  }
  .remove {
    display: block;
    background: #444;
    border: 1px solid black;
    color: white;
    text-align: center;
    cursor: pointer;
  }
  .remove:hover {
    background: white;
    color: black;
  }
</style>


  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>settings</h2>
      </div>
      
                   <div  class="add-button">
           <a href="{{route('admin.create')}}"  ><i class="fa fa-plus" ></i> Add New</a>
           
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
                                        <th>Store Name</th>
                                         <th>Email</th>
                                        <th>Phone No</th>
                                       
                                     
                                        <th>Action</th>
                                       
                                       
                                    </tr>
                                </thead>
                                <tbody>
                @foreach ($setting as $setting)
                                    <tr>
                                        <td>{{$setting->store_name}}</td>
                                        <td>{{$setting->email}}</td>
                                        <td>{{$setting->telephone}}</td>
                                       
                                       
                                       
                                       
                                        <td>
                   <a href="{{route('admin.edit_setting',$setting->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>


         
                      
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

 
@endsection
