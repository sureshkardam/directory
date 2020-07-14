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
                        <form method="post" action="">
                         <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
						<h2>Create Commission</h2><br>
						   <div class="row">
						   
						   		   
						   <div class="col-sm-6">
                  <div class="form-group">
                              <label for="email">Country<span style="color: red; position: static;">*</span>
                              </label>
                              <select id="country" name="country_id" class="form-control">
                                <option>Select Country</option>
                            @foreach($country as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                              </select>        
                            </div>
                          </div>
                          <div class="col-sm-6">
                             <div class="form-group">
                              <label for="email">State<span style="color: red; position: static">*</span>
                              </label>
                              <select id="state" name="state_id" class="form-control">
                                <option value="default">Select State</option>
                             
                              </select>        
                            </div>
                          </div>
                        </div>
                          <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">
                              <label for="email">Category<span style="color: red; position: static">*</span>
                              </label>
                              <select id="category" name="category_id" class="form-control">
                                <option>Select Category</option>
                            @foreach($category as $category)
                          <option value="{{$category->category_id}}">{{$category->name}}</option>
                            @endforeach
                              </select>
                              </div>
                              </div>
                              <div class="col-sm-6">  
                            <div class="form-group">
                              <label for="confirm password">Percentage<span style="color: red; position: static">*</span>
                              </label>
                              <input type="text" class="form-control" id="percentage" name="percentage" placeholder="">        
                            </div>
							</div>
            </div>
            <div class="row">
							<div class="col-sm-6">
                            <div class="form-group">
                              <label for="first_name">Status</label>
                             <select class="form-control" name="status" id="status">
                               <option value="1" selected>Active</option>
                               <option value="0">Inactive</option>
                             </select>    
                            </div>
					
							
						
						</div>
          </div>
					
						
                           <div class="save-btn text-center ">
                            <button type="submit" class="btn blue">Save</button>
                     </div>
                                                                     
                          </form>

                        
                    </div>
                </div>

      </div>
        </div>
		
		
    

   
               
    
</script> 

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


@endsection


