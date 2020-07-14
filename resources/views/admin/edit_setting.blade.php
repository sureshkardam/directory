@extends('admin.theme.layouts.app') 
@section('content')
<style>
.inventory-tab ul li a.active {
    background: #fed917 !important;
    position: relative;
    border-bottom: none;
}

.tab-content {
    border: 1px solid #ddd;
    padding: 10px 30px;
}



</style>
 

<div class="add-invetory-form">



                      <form method="post" action="{{route('admin.website.setting')}}" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    
        <div class="container">
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
            <div class="row">
                    <div class="col-sm-12 form-group">
                      
                        <h3>Setting</h3>
                    </div>
                </div>

            <div class="inventory-tab">
                <ul class="nav nav-tabs">
                    <li class="gernale"><a class="active show " data-toggle="tab" href="#general">GENERAL</a></li>
                    <li><a data-toggle="tab" href="#mail">Mail</a></li>
                   
                 </ul>
             </div>
             <div class="tab-content">
                 <div id="general" class="tab-pane fade in active show">
                    <div class="row inventory-box">
                        <div class="col-sm-12">

                    <div class="row">
                      <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Store Logo
                                </label>
                                <div class="store-logo">
                                   <img width="100%" src="{{url('/')}}/{{$setting->store_logo}}">
                                <!-- <input type="file" id="files" name="store_logo"  value="{{$setting->store_logo}}" class="form-control"  multiple />
                                 -->
                                <input type="file" id="files" name="store_logo" src="https://via.placeholder.com/150"  class="form-control" >
                                
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Icon
                                </label>
                               <div class="store-logo">
                                <img width="100px" src="{{url('/')}}/{{$setting->icon}}">
                                 <input type="file" id="files" name="icon" src="https://via.placeholder.com/150"   class="form-control" >
                                  
                               </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Meta Title<span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{$setting->meta_title}}" id="meta_title"  name="meta_title" >
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Store Name<span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{$setting->store_name}}" id="store_name" name="store_name">
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Store Owner<span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{$setting->store_owner}}" id="store_owner" name="store_owner">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Admin Email<span style="color: red">*</span>
                                </label>
                                <input type="email" class="form-control" id="email"  value="{{$setting->email}}" name="email">
                            </div>
                             <div class="form-field-here">
                                <label class="input-label">Telephone<span style="color: red">*</span>
                                </label>
                                <input type="text" class="form-control" id="telephone"  value="{{$setting->telephone}}" name="telephone">
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Weight Class<span style="color: red">*</span>
                                </label>
                                <select name="weight_class" id="weight_class" type="text" class="form-control select-form">
                                  <option value="{{$setting->weight_class}}">{{$setting->weight_class}}</option>
                                    <option value="default">Select Wight Class</option>
                                    <option value="kilogram">Kilogram</option>
                                    <option value="gram">Gram</option>
                                    <option value="pound">Pound</option>
                                     <option value="ounce">Ounce</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-field-here">
                                <label class="input-label">Admin Address<span style="color: red">*</span>
                                </label>
                                <textarea class="form-control" id="address" name="address">{{$setting->address}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-field-here">
                                <label class="input-label">Country<span style="color: red">*</span>
                                </label>
                                <select name="country" type="text" id="country" class="form-control select-form">
                                  @foreach($countries as $country)
              <option  @if ($country->id == $setting->country) selected @endif value="{{ $country->id }}"> {{$country->name}}</option>
              

              @endforeach
                                  
                                  
                                  
                                </select>
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">State<span style="color: red">*</span>
                                </label>
                                <select name="state" type="text" id="state" class="form-control select-form" >
                                 <option value="{{$setting->id}}">{{App\Model\Admin\State::getName($setting->state)}}
                                 </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Length Class<span style="color: red">*</span>
                                </label>
                                <select name="length_class" id="length_class" type="text" class="form-control select-form" >
                                  <option value="{{$setting->length_class}}">{{$setting->length_class}}</option>
                                    <option value="default">Select Length Class</option>
                                    <option value="centimeter">Centimeter</option>
                                    <option value="millimetre">Millimetre</option>
                                    <option value="inch">Inch</option>
                                </select>
                            </div>
                             <div class="form-field-here" >
                              <label for="email">Status</label>
                              <select type="text" name="status" class="form-control select-form">
                <option @if($setting->status == 1) selected @endif  value="1" >Active</option>
                <option @if($setting->status == 0) selected @endif value="0" >Inactive</option>
                              </select>
                          </div>
                        
                           <div class="col-sm-12">
                               <div class="form-field-here">
                                   <label class="input-label">Product Approve</label>
                                   <span  style="margin-left: 10px;">
                                       <input @if($setting->product_approve=='1') checked @endif value="1" name="product_approve" type="radio" > Yes
                                       <input @if($setting->product_approve=='0') checked @endif value="0" name="product_approve" type="radio" > No
                                   </span>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    <div id="mail" class="tab-pane fade">
      <div class="option-tab">
         <div class="row inventory-box">
         <div class="container">
            <div class="mail-form">
              <div class="row">
                   <div class="col-sm-12">
                    <div class="form-group">
                            <label for="joMail Engine">Mail Engine<span style="color: red">*</span>
                                </label>
                            <select id="mail_engine" name="mail_engine">
                                <option value="smtp">SMTP</option>
                                <option value="mail" selected>Mail</option>
                            </select>
                          </div>

                        <div class="row">
                          <div class="col-sm-6">
                                                   <div class="form-group">
                            <label for="Mail Parameters">Mail Parameters<span style="color: red">*</span>
                                </label>
                            <input type="text" class="form-control" name="mail_parameters"  value="{{$setting->mail_parameters}}" id="mail_parameters" placeholder="Mail Parameters">
                          </div>
                         <div class="form-group">
                            <label for="SMTP Hostname">SMTP Hostname<span style="color: red">*</span>
                                </label>
                            <input type="text" class="form-control" name="smtp_hostname"  value="{{$setting->smtp_hostname}}" id="smtp_hostname" placeholder="ssl://smtp.gmail.com">
                          </div>
                          <div class="form-group">
                            <label for="SMTP Username">SMTP Username<span style="color: red">*</span>
                                </label>
                            <input type="text" class="form-control" name="smtp_username"  value="{{$setting->smtp_username}}" id="smtp_username" placeholder="info@shoponapp.in">
                          </div>
                        </div>
                          <div class="col-sm-6">
                            
                          
                          <div class="form-group">
                            <label for="SMTP Password">SMTP Password<span style="color: red">*</span>
                                </label>
                            <input type="text" class="form-control" name="smtp_password"  value="{{$setting->smtp_password}}" id="smtp_password" placeholder="Info123#S">
                          </div>
                          <div class="form-group">
                            <label for="SMTP Port">SMTP Port<span style="color: red">*</span>
                                </label>
                            <input type="text" class="form-control" name="smtp_port"  value="{{$setting->smtp_port}}" id="smtp_port" placeholder="465">
                          </div>
                          <div class="form-group">
                            <label for="SMTP Timeout">SMTP Timeout<span style="color: red">*</span>
                                </label>
                            <input type="text" class="form-control" name="smtp_timeout" value="{{$setting->smtp_timeout}}" id="smtp_timeout" placeholder="5">
                          </div>
                          </div>
                        </div>
                           
                          <div class="mail-alert-box">                              
                               <div  class="inp-chack">
                                <p >Alert Mail<span style="color: red">*</span></p>
                               </div>
                                 <div  class="form-check">
                                 <input  class="form-check-input" name="alert_mail[]" type="checkbox" value="{{$setting->alert_mail}}" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Register
                                </label>
                                </div>
                                 <div class="form-check">
                                 <input class="form-check-input" name="alert_mail[]" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Affiliate
                                </label>
                                </div>
                                 <div class="form-check">
                                 <input class="form-check-input" name="alert_mail[]" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Orders
                                </label>
                                </div>
                                 <div class="form-check">
                                 <input class="form-check-input" name="alert_mail[]" type="checkbox" value="" id="defaultCheck1">
                                    <label  class="form-check-label" for="defaultCheck1">Reviews 
                                </label>
                                </div>
                          </div>
                            
                             <div class="form-group">
                            <label  style="margin-top: 20px;" class="form-check-label" for="Additional Alert Mail">Additional Alert Mail<span style="color: red">*</span>
                                </label>
                             <textarea name="additional_alert_mail" id="additional_alert_mail"    cols="127" rows="4">{{$setting->additional_alert_mail}}</textarea>
                    </div>
                    </div>
                </div>
            </div>
            </div>
             </div>
         </div>
     </div>
               
   <div class="col-sm-12">
                              <div class="form-field-here text-center" style="margin-top: 20px">
                                 <input type="submit" name="submit" value="Update" class="btn btn-primary">
                              </div>
                          </div>
</form>
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


        
@endsection


@section('script')

bootstrapValidate('#meta_title','required:Meta Title Field Is Required!');
bootstrapValidate('#store_name','required:Store Name Field Is Required!');
bootstrapValidate('#store_owner','required:Store Owner Field Is Required!');
bootstrapValidate('#address','required:Address Field Is Required!');
bootstrapValidate('#email','email:Enter Valid Email ID!');
bootstrapValidate('#email','required:Email Field Is Required!');
bootstrapValidate('#telephone','required:Telephone Field Is Required!');
bootstrapValidate('#telephone','numeric:Enter Valid Teleohone!');
bootstrapValidate('#store_logo  ','required:Store logo Is Required!');
bootstrapValidate('#icon','required:Icon Is Required!');
bootstrapValidate('#mail_parameters','required:Mail Parameters Field Is Required!');
bootstrapValidate('#smtp_hostname','required:SMTP Hostname Field Is Required!');
bootstrapValidate('#smtp_username','required:SMTP Username Field Is Required!');
bootstrapValidate('#smtp_password ','required:SMTP Password Field Is Required!');
bootstrapValidate('#smtp_port','numeric:Enter Valid SMTP Port!');
bootstrapValidate('#smtp_port','required:SMTP Port Field Is Required!');
bootstrapValidate('#smtp_timeout','numeric:Enter Valid SMTP Timeout!');
bootstrapValidate('#smtp_timeout','required:SMTP Timeout Field Is Required!');






@endsection
