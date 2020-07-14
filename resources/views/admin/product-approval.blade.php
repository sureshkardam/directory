@extends('admin.theme.layouts.app') 
@section('content')
  <div class="container">
        <div class="row">
            <!--produuct colom-->
            <div class="col-sm-12">
                <div class="content-dashboard-vendor">
        
        <div class="title-heading">
          <h2>Product Approval List</h2>
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
      <!--  <input type="" name="keyword" placeholder="Enter State Name. .">
           <input type="submit" class="btt" value="Filter"> -->
        
                        <div class="edit-account custom-form">
                        
                        <form class="form-pro"  action="{{route('admin.product-approval')}}" method="post">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                          <div class="row">
                            
							 
							  <div class="col-sm-3">
                                <div class="form-field">
                                    <label>Category</label>
                                    <select class="form-control select-form" name="cat">
									 <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
							 
							 
							 
							 
							 <div class="col-sm-3">
                                <div class="form-field">
                                    <label>Seller</label>
                                    <select name="seller" class="form-control">
                                        <option value="">Select Seller</option>
                                       
                                    @foreach($sellers as $seller)
                                    <option value="{{$seller->id}}">{{$seller->name}}</option>
                                    @endforeach
                                     
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-field">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select Status</option>
                                       <option value="1">Active</option>
                                       <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-field">
                                    <label>Approved</label>
                                    <select name="approval" class="form-control">
                                        <option value="">Select Approved</option>
                                        <option value="1">Approved</option>
                                        <option value="0">Un approved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-field">
                                    <label style="opacity: 0">submit</label>
                                    <input type="submit" class="btt" value="Filter" name="filter">
                                </div>
                            </div>
                        </div>
                    </form>
                        
							
							<table id="example" class="display table">
                            <thead>
                                <tr>
                                    <th>Seller</th>
									<th>Product ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
									<th>Approved</th>
                                    <th>Status</th>
                                   <th>Edit</th>
									 <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
							 @foreach($products as $product)
                                <tr>
                                     <td>{{App\User::getName($product->user_id)}}</td>
									<td>{{$product->id}}</td>
									
                                    <td><img width="25px;" src="{{ url('/') }}/{{\App\Model\Admin\Product::getSingleImage($product->id)}}" /></td>
                                   <td>{{str_limit($product->name, 6)}}</td>
                                    <td>{{$product->sku}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->quantity}}</td>
									<td >
						 <select class="form-control change_status"  name="change_status" data-id="{{$product->id}}">
							
							<option @if($product->is_admin_approved==1) style="color:red;" {{'selected'}}  @endif value="1">Approved</option>
							<option @if($product->is_admin_approved==0) {{'selected'}} @endif value="0">Un Approved</option>
							
							</select>
							
					</td>
                                    <td>{{$product->status}}</td>
                                   <td>
                                        <a class="action-dash" href="{{route('admin.product.edit',['id'=>$product->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            
                                    </td>
									<td>
									<a class="action-dash" href="{{route('admin.product.delete',$product->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
  
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
 <script type="text/javascript">
$(document).ready(function() {
		  $("select[name='change_status']").change(function(){
		  var row_id = $(this).attr('data-id');
		  var option_value=$(this).val(); 
		  
		  if(row_id && option_value){
			$.ajax({
           type: "GET",
           url:"{{route('ajaxUpdateMenuStatus')}}?id="+row_id+"&status="+option_value,
           success:function(data){      
				 $("#ajax-success").empty();
            	 $.each(data, function(key, value) {
               
               if(value.success==1){
			 				$('#ajax-success').append(value.msg);
							window.location.reload(true);
		  						}
                     });
        
           }
        });
			}
			  	
 });
    });      
</script>
 
@endsection
