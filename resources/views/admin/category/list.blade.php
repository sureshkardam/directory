@extends('admin.theme.layouts.app') 
@section('content')


 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Category List</li>
      </ol>
		<!-- Example DataTables Card-->
		
		<div class="col-sm-12">
                <div class="row">
                   
                    <div class="col-sm-12 text-right">
                        <a class="btn_1 medium" href="{{route('admin.category.create')}}" >Create Category</a>
                    </div>
                </div>
		</div>
		
		
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Category List</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                         <th>Sort Order</th>
                                        <th>Action</th>
										<th></th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($categories as $category)
                                  <tr>
                                    <td>{{$category->name}}</td> 
                                    <td>{{\App\Model\Admin\Category::getCategoryStatus($category->category_id)  ? 'Active' : 'Inactive'}}</td>
                                    <td>{{\App\Model\Admin\Category::getCreated($category->category_id)}}</td>
                                    <td>{{App\Model\Admin\Category::getSortOrder($category->category_id)}}</td>
                                           
                                    <td><a href="{{route('admin.category.edit',['id'=>$category->category_id])}}" ><i class="fa fa-pencil" aria-hidden="true" title="Edit"></i></a>
                                    </td>  
                               <td>


                                 <a onclick="deleteConfirm('category',{{$category->category_id}},'{{$category->name}}')"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a> </td> 
                                    
                                    </tr>
                                    @endforeach
                                       
              
                                   
                                </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
	  <!-- /tables-->
	  </div>

@endsection