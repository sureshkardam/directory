@extends('admin.theme.layouts.app') 
@section('content')
  
                   
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

      

    <div class="container">
        
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
        <div class="row">
            <div class="col-sm-12">
                <h2>Edit Promotion</h2>
                <div class="row edit-account">
                    <form action="{{route('admin.promotion.edit',$promotion->id)}}" method="post">
                  
                        <div class="form-group col-sm-12">
                        
                            <label for="email">Promotion Code</label>
                            <input type="text" value="{{$promotion->promotion_code}}" placeholder="Enter Promotion Code" class="form-control" name="promotion_code" id="code">
                        </div>
                        <div class="form-group col-sm-6">
                          <label for="email">Apply Promotion Conditions</label>

<select   name="promotion_conditions" class="form-control select-form">
              @foreach($promotion_name as $name)
              <option @if ($name->id == $promotion->promotion_conditions) selected @endif value="{{ $name->id }}">{{$name->name}}</option>
              @endforeach
            </select>



                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Promotion Amount</label>
                            <input type="text" class="form-control" id="amount" value="{{$promotion->promotion_amount}}" placeholder="Enter Promotion Amount" name="promotion_amount" >
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Min Spend Amount</label>
                            <input type="text" class="form-control" id="min" name="min_spend_amount"  placeholder="Enter Min Spend Amount" value="{{$promotion->min_spend_amount}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Max Spend Amount</label>
                            <input type="text" class="form-control" id="max" value="{{$promotion->max_spend_amount}}" name="max_spend_amount" placeholder="Enter Max Spend Amount">
                        </div>


                        <div class="col-sm-12">
                            <div class="form-field-here">
                                

            
                                
                                          <label class="input-label">Product Categories</label>
                                    <select class="form-control select-form" name="category[]" multiple>
                                    @foreach($categories as $category)
                                       
                 <option value="{{$category->category_id}}"  @if(in_array($category->category_id, $PromotionToCategory)) selected @endif >{{$category->name}}</option>
                                     
                                        @endforeach
                                </select>
                            </div>
                        </div>


                       
                            <div class="form-group col-sm-6">
                            <label for="select_user_role">Select User Role</label>
                            <select type="text" name="select_user_role" class="form-control select-form">
                              @foreach($group as $group)
                                    <option value="{{$group->id}}" @if($group->groupr_id==$group->id) selected @endif>{{$group->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Start Date</label>
                            <input type="date" value="{{$promotion->start_date}}" class="form-control" id="sDate" name="start_date" >
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">End Date</label>
                            <input type="date" class="form-control" value="{{$promotion->end_date}}" id="eDate" name="end_date" >
                        </div>
                      @csrf
                        <div class="form-group col-sm-6">
                            <label for="email">Enable Coupon</label>
                            <select type="text" name="status" class="form-control select-form">
                                <option @if($promotion->status == 1) selected @endif value="1" >Active</option>
                                <option @if($promotion->status == 0) selected @endif value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group form-check col-sm-12 text-center">
                           <input type="submit" name="submit" class="btn blue" value="Update">
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
