@extends('admin.theme.layouts.app') 
@section('content')
  
         
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
			
			
			 @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

 @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif
			
			
                <div class="page-heading-all"><h2>Create Promotion</h2></div>
                <div class="row edit-account">
                    <form action="{{route('admin.promotion.create')}}" method="post">
                        <div class="form-group col-sm-6">
                            <label for="email">Promotion Code
                           <span style="color: red">*</span>
                            </label>
                            <input type="text"  class="form-control" name="promotion_code" id="code" 
                            value="{{ old('promotion_code') }}">
                        </div>
                        <div class="form-group col-sm-6">
                          <label for="email">Apply Promotion Conditions <span style="color: red">*</span>
                            </label>


<select   name="promotion_conditions" class="form-control select-form">
              @foreach($promotion_name as $name)
              <option value="{{ $name->id }}">{{$name->name}}</option>
              @endforeach
            </select>


                       
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Promotion Amount <span style="color: red">*</span>
                            </label>
                            <input type="text" class="form-control" id="amount"  name="promotion_amount" 
                            value="{{ old('promotion_amount') }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Min Spend Amount <span style="color: red">*</span>
                            </label>
                            <input type="text" class="form-control" id="min" name="min_spend_amount"
                             value="{{ old('min_spend_amount') }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Max Spend Amount <span style="color: red">*</span>
                            </label>
                            <input type="text" class="form-control" id="max" name="max_spend_amount"
                            value="{{ old('max_spend_amount') }}" >
                        </div>
                         <div class="col-sm-6">
                             <div class="select-group-box">
                            <label for="select_user_role">Select User Group <span style="color: red">*</span>
                            </label>
                            <select type="text" name="select_user_role" class="form-control select-form"
                            >
                                <option value="default" selected>Select User Group</option>
                                @foreach($group as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                                                          </select>
                        </div>
                    </div>
                        <div class="form-group col-sm-6">
                            <div class="start-date-box">
                            <label for="email">Start Date <span style="color: red">*</span>
                            </label>
                            <input type="date" class="form-control" id="sDate" name="start_date" 
                            value="{{ old('start_date') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="end-date-box">
                            <label for="email">End Date <span style="color: red">*</span>
                            </label>
                            <input type="date" class="form-control" id="eDate" name="end_date"
                            value="{{ old('end_date') }}" >
                        </div>
                    </div>
                       <div class="form-group col-sm-12">
                             <div class="form-field-here">
                                <label class="input-label">Product Categories <span style="color: red">*</span>
                            </label>
                                <select class="form-control select-form" name="category_id[]" multiple>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                       <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group col-sm-12">
                            <label for="email">Enable Coupon</label>
                            <select type="text" name="status" class="form-control select-form">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        
                        <div class="form-group form-check col-sm-12 text-center">
                           <input type="submit" name="submit" class="btn blue customBtn" value="Save">
                        </div>
               
                </form>
                 </div>
            </div>
        </div>
    </div>


 
@endsection

@section('script')

bootstrapValidate('#amount','numeric:Please Check Your Amount');
bootstrapValidate('#min','numeric:Please Check Your Amount');
bootstrapValidate('#max','numeric:Please Check Your Amount');
bootstrapValidate('#code','max:50:Enter Valid Promotion Code');

@endsection

