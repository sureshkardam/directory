	
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Sign In</h3>
		</div>
		 <form action="<?php echo e(route('admin.login')); ?>" enctype="multipart/form-data" method="post">
                                       <?php echo csrf_field(); ?>
			<div class="sign-in-wrapper">
				
				<div class="form-group">
					<label>Email</label>
					<?php if(Session::has('appLoginErrors')): ?>
						<?php $__currentLoopData = Session::get('appLoginErrors')->get('Email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<span class="label label-danger"><?php echo e($errorMessage); ?></span>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<input type="text" name="email" placeholder="Email" id="input-username" class="form-control" required>
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<?php if(Session::has('appLoginErrors')): ?>
						<?php $__currentLoopData = Session::get('appLoginErrors')->get('Password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<span class="label label-danger"><?php echo e($errorMessage); ?></span>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					
					<input type="password" name="password"  placeholder="Password" id="input-password" class="form-control">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_15">
					
					<div class="float-right mt-1"><a  href="#.">Forgot Password?</a></div>
				</div>
				<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
				<div class="text-center">
					Don’t have an account? <a href="#.">Sign up</a>
				</div>
				<div id="forgot_pw">
					<div class="form-group">
						<label>Please confirm login email below</label>
						<input type="email" class="form-control" name="email_forgot" id="email_forgot">
						<i class="icon_mail_alt"></i>
					</div>
					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
				</div>
			</div>
		</form>
		
	</div>
	<?php /**PATH D:\xampp\htdocs\directory\resources\views/front/sign-up-popup.blade.php ENDPATH**/ ?>