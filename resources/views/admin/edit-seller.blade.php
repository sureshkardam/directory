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

@if ($errors->any())
    <div class="alert alert-danger">
     
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
       
    </div>
@endif
                    <div class="for-login">
                        <form method="post" action="#" enctype="multipart/data-form">
                         <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
             
            <h2>Edit Seller</h2><br>
            <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                              <label for="first_name">First Name
                                <span style="color: red; position: static;">*</span>
                  </label>
                              <input type="text" class="form-control" value="{{$user->getProfile->first_name}}" id="first_name" name="first_name" >        
                            </div>   
            <div class="form-group">
                  <label for="email">Email<span style="color: red; position: static;">*</span>
                  </label>

               
                              <input type="email" class="form-control" disabled value="{{$user->email}}" name="email" >
                            </div>
                             <div class="form-group">
                              <label for="company_name">Company Name
                                <span style="color: red; position: static;">*</span>
                  </label>
                              <input type="text" class="form-control" value="{{$user->getProfile->company_name}}" id="company_name" name="company_name"   >
                            </div>
                             <div class="form-group">
                                     <label>State
                                     <span style="color: red; position: static;">*</span>
                  </label>                                   
                                    <select type="text" id="state" name="state" class="form-control select-form">
                            
                           <option value="{{$user->getProfile->state}}">{{App\Model\Admin\State::getName($user->getProfile->state)}}</option>     
                                             
                              </select>
                            </div>
                      
              </div>
            <div class="col-sm-6">
              <div class="form-group">
                              <label for="last_name">Last Name
                                <span style="color: red; position: static;">*</span>
                  </label>
                              <input type="text" class="form-control" value="{{$user->getProfile->last_name}}" id="last_name" name="last_name"   >
                            </div>
            <div class="form-group">
                              <label for="telephone">Phone
                                <span style="color: red; position: static;">*</span>
                  </label>
                              <input type="text" id="phone" class="form-control" value="{{$user->getProfile->telephone}}" name="telephone"   >
                            </div>
                            <div class="form-group">
                <label>Country
                  <span style="color: red; position: static;">*</span>
                  </label>
                <select id="country" name="country" class="form-control select-form"  >
               
              @foreach($countries as $country)
               <option value="{{$country->id}}"  @if($user->getProfile->country==$country->id) selected @endif>{{$country->name}}</option>
              @endforeach
                    </select>
            </div>

                            <div class="form-group">
                            <label>City
                            <span style="color: red; position: static;">*</span>
                  </label>                                  
                       <select type="text" id="city" name="city" class="form-control select-form">
                          
                        <option value="{{$user->getProfile->city}}">{{App\Model\Admin\City::getName($user->getProfile->city)}}</option>           
                     </select>                        
                       </div>
              
              </div>
            </div>

     
                  <div class="form-group">
                              <label for="zipcode">ZIP Code
                                <span style="color: red; position: static;">*</span>
                  </label>
                            <input type="text" value="{{$user->getProfile->zipcode}}" name="zipcode" id="zipcode" class="form-control"   >
                            </div>
            
                            
                             <div class="form-group">
                              <label for="address">Address
                                <span style="color: red; position: static;">*</span>
                  </label>
                             <textarea  name="address"  cols="50" id="address"  class="form-control">{{$user->getProfile->address}}</textarea>
                            </div>
              
             

              
            
                                <!--  <div class="form-group">
                                     <label>Country</label>                                   
                            <select type="text" name="country" id="country" class="form-control select-form">
                            <option>Select Country</option>
                           
            </select>                        
               </div> -->
               <div class="row">
                <div class="col-sm-6">
                  
                           
                  </div>
                  
                     </div>

                

                                
              <div class="form-group">
                              <label for="bussiness_description">Bussiness Description
                                <span style="color: red; position: static;">*</span>
                  </label>
                               <textarea rows="4"  name="bussiness_description" id="description" cols="50"   class="form-control">{{$user->getProfile->bussiness_description}}</textarea>
                            </div>
              <div class="form-group">
                <label class="input-label">What industry is your business in?
                <span style="color: red; position: static;">*</span>
                  </label>               
                
                             <select type="text" name="bussiness_type[]" class="form-control select-form" multiple>
                
                
                
              @foreach($bussiness as $buss)

                 <option value="{{$buss->id}}"  @if(in_array($buss->id, $sellerBussinessType)) selected @endif >{{$buss->name}}</option>
                                    
                                       @endforeach
                
              </select>
                                
                </div>
                 <div class="form-group">
                              <label for="telephone">Status</label>
                             <select class="form-control">
                               <option @if($user->getProfile->status == 1) selected @endif value="1">Active</option>
                               <option @if($user->getProfile->status == 0) selected @endif value="0">Inactive</option>
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










