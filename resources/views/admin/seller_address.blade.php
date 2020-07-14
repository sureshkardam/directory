@extends('admin.theme.layouts.app') 
@section('content')

 <div class="container" style="margin-top: 20px;">
			<div class="row">				
				<div class="col-sm-12 col-md-6 col-lg-6 offset-md-3">
                    <div class="for-login">
                        <form  method="post" action="{{route('admin.create_useraddress')}}">
                        	<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

						<h2>User Address</h2><br>
                            <div class="form-group">
                              <label for="exampleInputEmail1">First Name</label>
                              <input type="text"  name="first_name" value="{{old('first_name')}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">        
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Last Name</label>
                              <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" id="exampleInputPassword1">
                            </div><div class="form-group">
                              <label for="exampleInputPassword1">Company Name</label>
                              <input type="text" name="company_name" value="{{old('company_name')}}"  class="form-control" id="exampleInputPassword1">
                            </div>
				

                             <div class="form-group">
                              <label for="exampleInputPassword1">Address</label>
                              <textarea rows="4" cols="50" name="address" value="{{old('address')}}" class="form-control"></textarea>
                            </div>
                          
                             <div class="form-group">
                              <label for="exampleInputPassword1">Zipcode</label>
                              <input type="text" name='zipcode' class="form-control" value="{{old('zipcode')}}" id="exampleInputPassword1">
                            </div>

                             <div class="form-group">
                              <label for="exampleInputPassword1">Phone</label>
                              <input type="text" name="telephone" value="{{old('telephone')}}" class="form-control" id="exampleInputPassword1">
                            </div>
							
							<!--  <div class="form-group">
                                     <label>Country</label>									 									
                                    <select type="text" class="form-control select-form">
							<option value="default">U.S.A.</option>
							<option value="wedding">Canada</option>
							<option value="wedding">Australia</option>
						</select>												 
						   </div> -->
						    <div class="form-group">
                                     <label>Country</label>									 									
                                    <select type="text" name="country" class="form-control select-form">
                             <option value="default">Select Country</option>
                            <option value="New South Wales">New South Wales</option>
							<option value="Queensland">Queensland</option>
							<option value="wedding">South Australia</option>
                            <option value="wedding">Tasmania</option>
                            <option value="wedding">Victoria</option>
                            <option value="wedding">Western Australia</option>
                            <option value="wedding">Australian Capital Territory</option>
                            <option value="wedding">Jervis Bay Territory</option>
                            <option value="wedding">Northern Territory</option>
                            <option value="wedding">Ashmore and Cartier Islands</option>
                            <option value="wedding">    Australian Antarctic Territory</option>
                            <option value="wedding">Christmas Island</option>
                            <option value="wedding">Cocos (Keeling) Islands</option>
                            <option value="wedding">    Coral Sea Islands</option>
                            <option value="wedding">Heard Island and McDonald Islands</option>
                            <option value="wedding">Norfolk Island</option>
						</select>												 
						   </div>

 <div class="form-group">
                                     <label>State</label>									 									
                                    <select type="text" name="state" class="form-control select-form">
                                    	<option value="default">Select State</option>
                            <option value="default">New South Wales</option>
							<option value="default">Queensland</option>
							<option value="wedding">South Australia</option>
                            <option value="wedding">Tasmania</option>
                            <option value="wedding">Victoria</option>
                            <option value="wedding">Western Australia</option>
                            <option value="wedding">Australian Capital Territory</option>
                            <option value="wedding">Jervis Bay Territory</option>
                            <option value="wedding">Northern Territory</option>
                            <option value="wedding">Ashmore and Cartier Islands</option>
                            <option value="wedding">    Australian Antarctic Territory</option>
                            <option value="wedding">Christmas Island</option>
                            <option value="wedding">Cocos (Keeling) Islands</option>
                            <option value="wedding">    Coral Sea Islands</option>
                            <option value="wedding">Heard Island and McDonald Islands</option>
                            <option value="wedding">Norfolk Island</option>
						</select>												 
						   </div>





                                 <div class="form-group">
                                     <label>City</label>									 									
                                    <select type="text"  name="city" class="form-control select-form">
                                    	<option value="default">Select City</option>
                            <option value="default">New South Wales</option>
							<option value="default">Queensland</option>
							<option value="wedding">South Australia</option>
                            <option value="wedding">Tasmania</option>
                            <option value="wedding">Victoria</option>
                            <option value="wedding">Western Australia</option>
                            <option value="wedding">Australian Capital Territory</option>
                            <option value="wedding">Jervis Bay Territory</option>
                            <option value="wedding">Northern Territory</option>
                            <option value="wedding">Ashmore and Cartier Islands</option>
                            <option value="wedding">    Australian Antarctic Territory</option>
                            <option value="wedding">Christmas Island</option>
                            <option value="wedding">Cocos (Keeling) Islands</option>
                            <option value="wedding">    Coral Sea Islands</option>
                            <option value="wedding">Heard Island and McDonald Islands</option>
                            <option value="wedding">Norfolk Island</option>
						</select>												 
						   </div>




							<div class="form-group">
                              <label for="exampleInputPassword1">Buisness Description</label>
                               <textarea rows="4" value="{{old('first_name')}}" cols="50" name="bussiness_description" class="form-control"></textarea>
                            </div>
							<div class="form-group">
							  <label class="input-label">What industry is your business in?</label>							  
							  
                             <select type="text" name="bussiness_type" class="form-control select-form" multiple>
							<option value="default">Homeware</option>
							<option value="Electronic">Electronic</option>
							<option value="Bedding">Bedding</option>
                            <option value="Experiences">Experiences</option>
                            <option value="hospitality">Hospitality</option>
                            <option value="camping">Camping</option>
                            <option value="clothing">Clothing</option>
							<option value="appliances">Appliances</option>
						</select>
                                
								</div>
                           <!-- <div class="form-group text-center">
                           <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div> <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha"> <div class="help-block with-errors"></div>
                           </div> -->
						      <div class="row text-center">																							
										<div class="col-sm-12">
                                        <input type="checkbox" checked="" required="" style="width: auto;"> Accept Terms & Conditions
                                    </div>
									</div>
						    <div class="form-group text-center">
                               <p class="forgot-pass">Already Registered? <a href="partner-centre-login.html">Please Login</a></p>
                           </div>
						
                           <div class="form-group text-center" style="margin-top: 40px; margin-bottom: 60px;">
                            <button type="submit" class="btn blue">Register</button>
                        </div>
                            <div class="form-group">
                                <p></p>
                            </div>                                           
                          </form>

                        
                    </div>
                </div>

			</div>
        </div>




@endsection