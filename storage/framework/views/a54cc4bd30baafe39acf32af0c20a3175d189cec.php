<div class="modal fade contat-seller-form" id="contactSeller">
						 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Contact Seller</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<form>
      <div class="modal-body">
        
			<div class="left-form">
				<div class="row">
					<div class="col-sm-2 form-group">
						<select class="form-control" required>
							<option>Gender</option>
							<option>Mr.</option>
							<option>Mrs.</option>
							<option>Ms.</option>
							<option>Miss.</option>
							<option>Dr.</option>
						</select>
					</div>
					<div class="col-sm-5 form-group">
						<input type="text" name="first_name" placeholder="First Name" class="form-control" required>
						<i class="ti user"></i>
					</div>
					<div class="col-sm-5 form-group">
						<input type="text" name="last_name" placeholder="Last Name" class="form-control" required>
					</div>
					<div class="col-sm-6 form-group">
						<input type="email" name="email_address" placeholder="Email Address" class="form-control" required>
					</div>
					<div class="col-sm-6 form-group">
						<input type="tel" name="telephone_number" placeholder="Telephone Number" class="form-control" required>
					</div>
					<div class="col-sm-12 form-group">
						<select class="form-control" required>
							<option>Select Country</option>							
							<?php $__currentLoopData = \App\Model\Admin\Country::getAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="col-sm-12 form-group">						
						<textarea class="form-control">Please send me more information about this business</textarea>
					</div>
					<div class="col-sm-12 form-group">
						<div class="legals-overlay">
							<ol>
								<li class="tt-wrap">
									<label for="recieve_emails">
									<input type="checkbox" name="revieve" id="recieve_emails" value="1">
									</span> Receive emails from carefully selected third parties </label>
									<span class="tt-title"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
								</li>
								<li class="tt-wrap">
									<label for="business-receive">
									<input type="checkbox" name="business-receive" id="business-receive" value="1">
									</span> Receive Bestbizdeal.ca newsletters, offers &amp; updates </label>
									<span class="tt-title"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
								</li>
							</ol>
						</div>
					</div>
					<div class="col-sm-12 form-group" style="margin-bottom:0px;">
						<div class="terms">
							<p class="quick-enquire-terms">
								We will send the above details to Have A Look. For more information about how we use your data, read our <a target="_blank" href="#.">privacy policy</a>.
								By submitting this form, you confirm that you agree to our
								<a href="#." class="contenttext04link" target="_blank">
								Terms and Conditions.
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		
      </div>

      <div class="modal-footer">
	   <button type="submit" class="btn btn-primary">Send Message</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
					</div><?php /**PATH D:\xampp\htdocs\directory\resources\views/front/contact-seller.blade.php ENDPATH**/ ?>