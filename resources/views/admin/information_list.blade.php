@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>CMS Page list</h2>
      </div>
      
                   <div  class="add-button">
           <a href="{{route('admin.create_information')}}"  ><i class="fa fa-plus" ></i> Add New</a>
           
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
                                        <th>Title</th>
                                        <th>Seo Url </th>
                                         <th>Meta Title </th>
                                        <th>Meta Description</th>
                                        
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>


                                     @foreach ($information as $information)
                                    <tr>
                                        <td>{{$information->title}}</td>
                                        <td>{{$information->seo_url}}</td>
                                        <td>{{$information->meta_title}}</td>
                                         <td>{{$information->meta_description}}</td>
                                        
                                        <!-- <td>{{$information->status}}</td> -->
                                        <td>{{$information->status ? 'Active' : 'Inactive' }}</td>
               
                                        <td>
                   <a href="{{route('admin.edit_information',$information->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>


         
                      
                                        </td>
                     <td>
                                            <a href="{{route('admin.delete_information',$information->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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


