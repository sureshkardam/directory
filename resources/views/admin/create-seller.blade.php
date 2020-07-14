@extends('admin.theme.layouts.app') 
@section('content')

<style>
  select#country {
    height: 46px;
    border-radius: 0px;
}

select#state{
    height: 46px;
    border-radius: 0px;
}

select#city{

    height: 46px;
    border-radius: 0px;
}

</style>

           <div class="today-orders-div">
                               

<div class="container" style="margin-top: 20px;">
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
                    <div class="for-login">
                        <form method="post" action="{{route('admin.seller.create')}}">
                         <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
						<h2>Create Seller</h2><br>
						   <div class="row">
						   <div class="col-sm-6">
                <div class="form-group">
                              <label for="first_name">First Name<span style="color: red; position: static;">*</span>
                  </label>
                              <input type="text" class="form-control" id="fname" name="first_name" placeholder="Enter Your First Name" value="{{old('first_name')}}">        
                            </div>
                             <div class="form-group">
                              <label for="email">Email<span style="color: red; position: static;">*</span>
                  </label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="{{old('email')}}">        
                            </div>
                            <div class="form-group">
                              <label for="password">Password<span style="color: red; position: static;">*</span>
                  </label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your  Password">        
                            </div>
                            <div class="form-group">
                              <label for="company_name">Company Name<span style="color: red; position: static;">*</span>
                  </label>
                              <input type="text" class="form-control" id="cname" name="company_name" value="{{old('company_name')}}"  placeholder="Enter Your Company Name" >
                </div>

                            <div class="form-group">
                                  <label>State<span style="color: red; position: static;">*</span>
                  </label>                                  
                                  <select type="text" id="state" name="state" class="form-control select-form">
                <option value="default" selected>Select State</option>         
                           
              </select> 
              </div>
                           
							</div>
							<div class="col-sm-6">
                            
							 <div class="form-group">
                              <label for="last_name">Last Name<span style="color: red; position: static;">*</span>
                  </label>
                              <input type="text" class="form-control" id="lname" name="last_name"  placeholder="Enter Your Last Name" value="{{old('last_name')}}" >
                            </div>
							<div class="form-group">
                              <label for="telephone">Phone<span style="color: red; position: static;">*</span>
                  </label>
                              <input type="text" id="phone" class="form-control" name="telephone"  placeholder="Enter Your Phone.no" value="{{old('telephone')}}">
                            </div>
                             <div class="form-group">
                              <label for="confirm password">Confirm Password<span style="color: red; position: static;">*</span>
                  </label>
                              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Your Confirm-password">        
                            </div>
                             <div class="form-group">
          <label>Country<span style="color: red; position: static;">*</span>
                  </label>
          <select id="country" name="country" class="form-control select-form"  >
          <option value="">Select Country</option>

          @foreach($countries as $country)
           <option value="{{$country->id}}">{{$country->name}}</option>
          @endforeach
          
           
            </select>
        </div>
           

                                 <div class="form-group">
                                     <label>City<span style="color: red; position: static;">*</span>
                  </label>                                  
                                    <select type="text" id="city" name="city" class="form-control select-form">
                              <option value="default" selected>Select City</option>         
                          
                           
              </select>                        
               </div>
							</div>
							</div>
               <div class="form-group">
                              <label for="zipcode">ZIP Code<span style="color: red; position: static;">*</span>
                  </label>
                            <input type="text" name="zipcode" id="zipcode" class="form-control"  placeholder="Enter Your ZIP Code" value="{{old('zipcode')}}">
                            </div>
							
                            
                             <div class="form-group">
                              <label for="address">Address<span style="color: red; position: static;">*</span>
                  </label>
                             <textarea  name="address" cols="50" id="address"  placeholder="Enter Your Address" class="form-control" >{{old('address')}}</textarea>
                            </div>
							
							
						  <div class="form-group">
							<label class="input-label">What industry is your business in?<span style="color: red; position: static;">*</span>
                  </label>
							
										 <select type="text" name="bussiness_type[]" class="form-control select-form" multiple>
									 
										 @foreach($business as $name)
										 <option value="{{ $name->id }}">{{$name->name}}</option>
										 @endforeach
									   </select>
									  
																	
									</div> 
                               
						<div class="form-group">
                              <label for="bussiness_description">Buisness Description<span style="color: red; position: static;">*</span>
                  </label>
                               <textarea class="form-control"  id="description" name="bussiness_description" 
                                style='none'>{{old('bussiness_description')}}</textarea>
                            </div>
                             <div class="form-group">
                              <label>Status</label>
                           <select class="form-control" name="status">
                             <option value="1" selected>Active</option>
                             <option value="0">Inactive</option>
                           </select>
                            </div>
              
                         
                
                           <div class="form-group text-center" style="margin-top: 40px; margin-bottom: 60px;">
                            <button type="submit" class="btn blue">Save</button>
                        </div>
                            <div class="form-group">
                                <p></p>
                            </div>                                           
                          </form>

                        
                    </div>
                </div>

      </div>
        </div>
		
		
		<script  src="https://code.jquery.com/jquery-3.4.1.min.js"  ></script>
<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();    
    
	if(countryID){
        $.ajax({
           type: "GET",
           url:"{{route('admin.state')}}?country_id="+countryID,
           success:function(data){               
          
               
             //alert(data);
              $("#state").empty();
               
               $.each(data, function(key, value) {
    //console.log(value.name);
                    $("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
});
               
               
               
               /* $("#state").empty();
               
                $.each(data,function(key,value){
                   
                     
                   
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });*/
           
           }
        });
    }else{
        $("#state").empty();
       
    }      
   });
    
</script>     

<script type="text/javascript">
    $('#state').change(function(){
    var stateID = $(this).val();    
    
	if(stateID){
        $.ajax({
           type: "GET",
           url:"{{route('admin.city')}}?state_id="+stateID,
           success:function(data){               
          
               
             //alert(data);
              $("#city").empty();
               
               $.each(data, function(key, value) {
    //console.log(value.name);
                    $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
});
               
               
               
               /* $("#state").empty();
               
                $.each(data,function(key,value){
                   
                     
                   
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });*/
           
           }
        });
    }else{
        $("#city").empty();
       
    }      
   });
    
</script>     
@endsection

@section('script')

bootstrapValidate('#fname','alpha:Enter Valid Name');
bootstrapValidate('#email','email:Enter Valid Email');
bootstrapValidate('#confirm_password','matches:#password:Your Password do not match');
bootstrapValidate('#fname','alpha:Enter Valid Name');
bootstrapValidate('#lname','alpha:Enter Valid Name');
bootstrapValidate('#phone','numeric:10:Enter');
bootstrapValidate('#phone','min:10:Please Check Your Number');
bootstrapValidate('#phone','max:10:Please Check Your Number');
bootstrapValidate('#zipcode','max:9:Please Check Your ZIP Code');

<script type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                            <script>
                        CKEDITOR.replace( 'description' );
                </script>

@endsection


