 
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('front.layouts.inner_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						
						<section id="description">
							<div class="detail_title_1">
								
							
								<h1><?php echo e($listing->listing_title); ?></h1>
								
							</div>
							<p><?php echo e($listing->listing_description); ?></p>
					
							
							<hr>
							<h3>Details</h3>
							<table class="table table-striped add_bottom_45">
								<tbody>
									
									
									<?php if($listing->getAdditional->asking_price): ?>
									<tr>
										<td>Asking Price</td>
										<td><?php echo e($listing->getAdditional->asking_price); ?></td>
									</tr>
									<?php endif; ?>
									
									<?php if($listing->getAdditional->gross_revenue): ?>
									<tr>
										<td>Gross Revenue</td>
										<td><?php echo e($listing->getAdditional->gross_revenue); ?></td>
									</tr>
									<?php endif; ?>
									<?php if($listing->getAdditional->sales_revenue): ?>
									<tr>
										<td>Sales Revenue</td>
										<td><?php echo e($listing->getAdditional->sales_revenue); ?></td>
									</tr>
									<?php endif; ?>
									<?php if($listing->getAdditional->cash_flow): ?>
									<tr>
										<td>Cash Flow</td>
										<td><?php echo e($listing->getAdditional->cash_flow); ?></td>
									</tr>
									<?php endif; ?>
									<?php if($listing->getAdditional->down_payment): ?>
									<tr>
										<td>Down Payment</td>
										<td><?php echo e($listing->getAdditional->down_payment); ?></td>
									</tr>
									<?php endif; ?>
									<?php if($listing->getAdditional->inventory): ?>
									<tr>
										<td>Inventory</td>
										<td><?php echo e($listing->getAdditional->inventory); ?></td>
									</tr>
									<?php endif; ?>
									<?php if($listing->getAdditional->office_area_type): ?>
									<tr>
										<td>Office Area Type</td>
										<td><?php echo e($listing->getAdditional->office_area_type); ?></td>
									</tr>
									<?php endif; ?>
									
									<?php if($listing->getAdditional->reason_for_selling): ?>
									<tr>
										<td>Reason For Selling</td>
										<td><?php echo e($listing->getAdditional->reason_for_selling); ?></td>
									</tr>
									<?php endif; ?>
									<?php if($listing->getAdditional->support_training): ?>
									<tr>
										<td>Support & Training</td>
										<td><?php echo e($listing->getAdditional->support_training); ?></td>
									</tr>
									<?php endif; ?>
									
									<?php if($listing->getAdditional->ff_and_d_included): ?>
									<tr>
										<td>FF & D Included</td>
										<td><?php echo e($listing->getAdditional->ff_and_d_included); ?></td>
									</tr>
									<?php endif; ?>
									
									<?php if($listing->getAdditional->ebitda): ?>
									<tr>
										<td>EDITDA</td>
										<td><?php echo e($listing->getAdditional->ebitda); ?></td>
									</tr>
									<?php endif; ?>
									
									
									<?php if($listing->getAdditional->financing): ?>
									<tr>
										<td>Financing</td>
										<td><?php echo e($listing->getAdditional->financing); ?></td>
									</tr>
									<?php endif; ?>
									
									<?php if($listing->getAdditional->franchise): ?>
									<tr>
										<td>Franchise</td>
										<td><?php echo e($listing->getAdditional->franchise); ?></td>
									</tr>
									<?php endif; ?>
									
									<?php if($listing->getAdditional->number_of_employee): ?>
									<tr>
										<td>Number of Employee</td>
										<td><?php echo e($listing->getAdditional->number_of_employee); ?></td>
									</tr>
									<?php endif; ?>
									
									<?php if($listing->getAdditional->year_established): ?>
									<tr>
										<td>Year of Establishment</td>
										<td><?php echo e($listing->getAdditional->year_established); ?></td>
									</tr>
									<?php endif; ?>
									
									
								</tbody>
							</table>
							
							
						</section>
					
	

							
					</div>
				
					<aside class="col-lg-4" id="sidebar">
						<div class="button-conatcts booking">
							<div class="btn-contact-list">
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactSeller">
  Contact Seller
</button>
</div>
						
							<ul class="share-buttons">
							<li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
							<li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Share</a></li>
							<li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
						</ul>
						</div>
						
					</aside>
				</div>
				
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/front/list_detail.blade.php ENDPATH**/ ?>