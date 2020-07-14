@extends('admin.theme.layouts.app') 
@section('content')
<style>
.inventory-tab ul li a.active {
    background: #fed917 !important;
    position: relative;
    border-bottom: none;
}


</style>


<div class="add-invetory-form">
                     	<form method="post" action="{{route('admin.website.setting')}}">
  
        <div class="container">
            <div class="row">
                    <div class="col-sm-12 form-group">
                        <h3>Edit Setting</h3>
                    </div>
                </div>

            <div class="inventory-tab">
                <ul class="nav nav-tabs">
                    <li><a class="active" data-toggle="tab" href="#general">GENERAL</a></li>
                    <li><a data-toggle="tab" href="#mail">Mail</a></li>
                   
                 </ul>
             </div>
             <div class="tab-content">
                 <div id="general" class="tab-pane fade in active">
                    <div class="row inventory-box">
                        <div class="col-sm-12">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Meta Title</label>
                                <input type="text" class="form-control"  name="meta_title" >
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Store Name</label>
                                <input type="text" class="form-control" name="store_name">
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Store Owner</label>
                                <input type="text" class="form-control" name="store_owner">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="form-field-here">
                                <label class="input-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                             <div class="form-field-here">
                                <label class="input-label">Telephone</label>
                                <input type="text" class="form-control" name="telephone">
                            </div>

                            <div class="form-field-here">
                                <label  class="input-label">Country</label>
                                <select name="country"  class="form-control select-form">
                                    <option value="india">India</option>
                                    <option value="usa">USA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">State</label>
                                <select type="text" name="state" class="form-control select-form" >
                                    <option value="haryana">Haryana</option>
                                    <option value="delhi">Delhi</option>
                                    <option value="texas">Texas</option>
                                    <option value="ohio">Ohio</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Length Class</label>
                                <select type="text" name="length_class" class="form-control select-form" >
                                    <option value="default">Select Length Class</option>
                                    <option value="centimeter">Centimeter</option>
                                    <option value="millimetre">Millimetre</option>
                                    <option value="inch">Inch</option>
                                </select>
                            </div>
                        </div>
                           <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Weight Class</label>
                                <select type="text" name="weight_class" class="form-control select-form">
                                    <option value="default">Select Wight Class</option>
                                    <option value="kilogram">Kilogram</option>
                                    <option value="gram">Gram</option>
                                    <option value="pound">Pound</option>
                                     <option value="ounce">Ounce</option>
                                </select>
                            </div>
                        </div>
                      
                      
                       
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Store Logo</label>
                                <input type="file" name="store_logo" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field-here">
                                <label class="input-label">Icon</label>
                                <input type="file" name="icon" class="form-control">
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
                            <label for="joMail Engine">Mail Engine</label>
                            <select name="mail_engine">
                                <option value="smtp">SMTP</option>
                                <option value="mail">Mail</option>
                            </select>
                          </div>
                         <div class="form-group">
                            <label for="Mail Parameters">Mail Parameters</label>
                            <input type="text" class="form-control" name="mail_parameters" id="Mail_Parameters" placeholder="Mail Parameters">
                          </div>
                         <div class="form-group">
                            <label for="SMTP Hostname">SMTP Hostname</label>
                            <input type="text" class="form-control" name="smtp_hostname" id="SMTP_Hostname" placeholder="ssl://smtp.gmail.com">
                          </div>
                          <div class="form-group">
                            <label for="SMTP Username">SMTP Username</label>
                            <input type="text" class="form-control" name="smtp_username" id="SMTP_Username" placeholder="info@shoponapp.in">
                          </div>
                          
                          <div class="form-group">
                            <label for="SMTP Password">SMTP Password</label>
                            <input type="password" class="form-control" name="smtp_password" id="SMTP_Password" placeholder="Info123#S">
                          </div>
                          <div class="form-group">
                            <label for="SMTP Port">SMTP Port</label>
                            <input type="text" class="form-control" name="smtp_port" id="SMTP_Port" placeholder="465">
                          </div>
                           <div class="form-group">
                            <label for="SMTP Timeout">SMTP Timeout</label>
                            <input type="text" class="form-control" name="smtp_timeout" id="SMTP_Timeout" placeholder="5">
                          </div>
                          <div  class="mail-alert-box">
                              <h5>Mail Alerts</h5>                                
                               <div   class="inp-chack">
                                <p>Alert Mail</p>
                                 <div  class="form-check">
                                 <input name="alert_mail" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Default checkbox</label>
                                </div>
                                 <div class="form-check">
                                 <input name="alert_mail" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Affiliate</label>
                                </div>
                                 <div class="form-check">
                                 <input name="alert_mail" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Orders</label>
                                </div>
                                 <div class="form-check">
                                 <input name="alert_mail" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Reviews</label>
                                </div>
                               </div>
                          </div>
                            <label  style="margin-top: 20px; class="form-check-label" for="Additional Alert Mail">Additional Alert Mail</label>
                             <textarea name="additional_alert_mail" cols="149" rows="4"></textarea>
		                </div>
		            </div>
      			</div>
		        </div>
		         </div>
		     </div>
		 </div>
               
	 <div class="col-sm-12">
	                            <div class="form-field-here text-center" style="margin-top: 20px">
	                               <input  type="submit" name="submit" value="submit" class="btn btn-primary">
	                            </div>
	                        </div>
</form>
</div>
@endsection