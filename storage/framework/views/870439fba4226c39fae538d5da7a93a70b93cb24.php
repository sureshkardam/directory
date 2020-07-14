				
								

<?php $__empty_1 = true; $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>



					<div class="strip list_view">					
						<div class="strip-main-div">
							<div class="strip-mainHead">
								<h3><a href="<?php echo e(url('listing',$listing->id)); ?>"><?php echo e(Str::title($listing->listing_title)); ?></a></h3>
								<small><?php echo e(\App\Model\Admin\State::getName($listing->getLocation->state)); ?></small>
								<i class="icon_pin_alt"></i>
							</div>
							<div class="strip-mainBody">
								<div class="mainbody-image">
									<!--<a href="detail-restaurant.html"><img src="img/location_2.jpg" class="img-fluid" alt=""></a>-->
									
									
								</div>
								<div class="mainbody-content">
									<p>
									
									<?php echo e(Str::limit($listing->listing_description, 300, $end='...')); ?>

									
									</p>
								</div>
								<div class="mainbody-labels">
									<ul>
										<?php if($listing->getAdditional->asking_price): ?>
										<li>
											<h5>Asking Price:</h5>
											<p><?php echo e($listing->getAdditional->asking_price); ?></p>
										</li>
										<?php endif; ?>
										<?php if($listing->getAdditional->gross_revenue): ?>
										<li>
											<h5>Revenue:</h5>
											<p><?php echo e($listing->getAdditional->gross_revenue); ?></p>
										</li>
										<?php endif; ?>
										<?php if($listing->getAdditional->cash_flow): ?>
										<li>
											<h5>Cash Flow:</h5>
											<p><?php echo e($listing->getAdditional->cash_flow); ?></p>
										</li>
										<?php endif; ?>
										
										<?php if($listing->getAdditional->sales_revenue): ?>
											
										<li>
											<h5>Sales Revenue:</h5>
											<p><?php echo e($listing->getAdditional->sales_revenue); ?></p>
										</li>
									
									<?php endif; ?>
									
									</ul>
								</div>
							</div>
							<div class="strip-mainFoot">
								<div class="mainFoot-links">
									
									<?php if($listing->getCategories): ?>
									<ul>
										
					<?php $__currentLoopData = $listing->getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e(\App\Model\Admin\Category::getName($cat->category_id)); ?></li>
											
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
									</ul>
									<?php endif; ?>
								</div>
								<div class="mainFoot-button">
								
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactSeller">
  Contact Seller
</button>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							
							
					<div class="strip list_view nthng">
						<div class="row no-gutters">
							
							<div class="col-lg-12">
								<div class="wrapper">
							<h3 class="text-center">No Listing</h3>
							
							</div>
							</div>
							</div>
							</div>
					<?php endif; ?>
		
		<?php /**PATH D:\xampp\htdocs\directory\resources\views/front/list-data.blade.php ENDPATH**/ ?>