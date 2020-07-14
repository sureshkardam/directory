@extends('admin.theme.layouts.app') 
@section('content')

   <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">CSV List</li>
      </ol>
		<!-- Example DataTables Card-->
		
		<div class="col-sm-12">
                <div class="row">
                   
                    <div class="col-sm-6">
                        <a href="{{route('admin.file.import')}}" >Import Listing</a>
                    </div>
                </div>
		</div>
		
		
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> CSV List</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
               <tr>
                                    <th>File Name</th>
                                    <th>Date</th>
                                    <th>Products</th>
                                    <th>Status</th>
                                    <th>Download</th>
                                </tr>
              </thead>
              
              <tbody>
                @foreach($imports as $import)
								
								<tr>
                                    <td>{{ Str::limit($import->csv_filename, 40,'..') }}</td>
									
									
									
									
                                    <td>{{date('M\. d\, Y\,h\:i\:s\,', strtotime($import->created_at))}}</td>
                                    <td>{{$import->records}}</td>
                                    <td>
                                       
                                           @if($import->status=='1') Complete 
										   @else
											In Process   
										   @endif 
                                           
                                       
                                    </td>
                                    <td><a href="#." target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
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


