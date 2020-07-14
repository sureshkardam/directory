@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <!--produuct colom-->
        <div class="col-sm-12">
            <div class="content-dashboard-vendor">
                <div class="title-heading">
                    <h2>Products</h2>
                </div>
                <div class="add-button">
                    <a href="{{route('admin.product.add')}}"><i class="fa fa-plus"></i> Add New</a>
                </div>
                <div class="today-orders-div">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
					
					 @if(session()->has('error'))
                    <div class="alert alert-success">
                        {{ session()->get('error') }}
                    </div>
                    @endif
					
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
                    <div class="edit-account custom-form">
                        <form class="form-pro"  action="{{route('admin.product')}}" method="post">
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
                                    <th>Product ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Edit</th>
									 <th>Delete</th>
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
                                    <td>{{$product->status ? 'Active' : 'Inactive' }}</td>
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
@endsection
