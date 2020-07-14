@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Sponser Products</h2>
      </div>
      
                   <div  class="add-button">
           <a href=""  ><i class="fa fa-plus" ></i> Add New</a>
           
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
       
                        <div class="edit-account">
                        
                            
							
							<table id="example" class="display table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							 @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
									
                                    <td><img width="25px;" src="{{ url('/') }}/{{\App\Model\Admin\Product::getSingleImage($product->id)}}" /></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->sku}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->status}}</td>
                                    <td>
									<a class="action-dash" href="" ><i class="fa fa-pencil" aria-hidden="true"></i>
                                    <a class="action-dash" href=""  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
