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
<div class="container" style="margin-top: 20px;">
      <div class="row">       
        <div class="col-sm-12">
                    <div class="for-login">
                        <form method="post" action="{{route('admin.edit-commision',$commision->id)}}">
                         <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <h2>Edit Commission</h2><br>
               <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                              <label for="country_id">Country<span style="color: red; position: static;">*</span></label> 
                             <select id="country"  name="country_id" class="form-control select-form"  >
                @foreach($country as $country)
              <option  @if ($country->id == $commision->country_id) selected @endif value="{{ $country->id }}">{{$country->name}}</option>
              @endforeach

                    </select>      
                            </div>
                          </div>
                          <div class="col-sm-6">
                             <div class="form-group">
                              <label for="email">State<span style="color: red; position: static;">*</span></label>
                              <select id="state" name="state_id" class="form-control">


                                <!--   @foreach($state as $state)
              <option @if ($state->id == $commision->state_id) selected @endif value="{{ $state->id }}">{{$state->name}}</option>
              @endforeach -->
              <option value="{{$commision->id}}">{{App\Model\Admin\State::getName($commision->state_id)}}</option>

                               
                             
                              </select>        
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="email">Category<span style="color: red; position: static;">*</span></label>
        
                               <select  id="category" name="category_id" class="form-control select-form">
                             @foreach($category as $cat)
                                    <option value="{{$cat->category_id}}" @if($cat->category_id==$commision->category_id) selected @endif>{{$cat->name}}</option>
                                    @endforeach
                            </select>
                              </div>
                              </div>
                              <div class="col-sm-6">  
                            <div class="form-group">
                              <label for="confirm password">Percentage<span style="color: red; position: static;">*</span></label>
                              <input type="text"  value="{{$commision->percentage}}" class="form-control" id="percentage" name="percentage" placeholder="">        
                            </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                            <div class="form-group">
                              <label for="first_name">Status</label>
                             <select class="form-control" name="status" id="status">
                               <option @if($commision->status == 1) selected @endif value="1" >Active</option>
                               <option @if($commision->status == 0) selected @endif value="0">Inactive</option>
                             </select>    
                            </div>
                          </div>          
            </div>
          
            
                          <div class="text-center save-btn">
                            <button type="submit" class="btn blue">Save</button>
                     </div>
                           
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


