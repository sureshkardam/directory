@extends('admin.theme.layouts.app') 
@section('content')

   <div class="container-fluid">
			
			
			 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Import File</li>
     </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Import File</h2>
			</div>
			
			
			<div class="row">
					
				<div class="col-sm-12">
				<div class="prog">
				<div class="progress" style="height:40px;">
				
				@if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif
				
    <div class="progress-bar bg-success" style="width:30%; font-size:20px;">
    1. Upload File
    </div>
    <div class="progress-bar bg-secondary" style="width:30%; font-size:20px;">
     2. Map Fields
    </div>
    <div class="progress-bar bg-secondary" style="width:40%; font-size:20px;">
      3. Save Records
    </div>
  </div>											
				</div>
					
					
							 <form class="form-horizontal" method="POST" action="{{route('admin.import.parse')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                               
								
								
								
						<div class="col-sm-12">
                            <div class="form-group">
                                <label class="input-label">Select Product Categories <span style="color: red">*</span>
                                </label>
                               <select class="form-control select-form" name="category_id[]"  multiple required>
                                    
									<option value="">Auto Detect</option>
									@foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
						
						
						<div class="col-sm-12">
                            <div class="form-group">
                                <label class="input-label">Select Website <span style="color: red">*</span>
                                </label>
                                
								 <select class="form-control select-form" name="website"  required>
                                    @foreach($websites as $website)
                                    <option value="{{$website->id}}">{{$website->name}}</option>
                                    @endforeach
                                </select>
								
								
                            </div>
                        </div>
								
								
								
								
								
                                <div class="col-md-12">
                                    <label class="input-label">Only CSV files <span style="color: red">*</span>
                                </label>
									<input id="csv_file" type="file" class="form-control" name="csv_file" required>

                                    @if ($errors->has('csv_file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group" style="display:none">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="header" checked> File contains header row?
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn_1 medium">
                                        Parse CSV
                                    </button>
                                </div>
                            </div>
                        </form>
			
			</div>
		</div>


	</div>
	</div>








@endsection