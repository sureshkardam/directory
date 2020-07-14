<section class="hero_single version_4">
			<div class="wrapper">
				<div class="container">
					<h3>Search Businesses for Sale around Canada!</h3>
					
					<form method="post" action="<?php echo e(route('listing.filter')); ?>">
						<?php echo csrf_field(); ?>
						<div class="row no-gutters custom-search-input-2">
							<div class="col-lg-4">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="What are you looking for..." name="filter_title">
									<i class="icon_search"></i>
								</div>
							</div>
							<div class="col-lg-3">
									<select class="wide" name="filter_location[]">
									<option value="">All Location</option>	
							  
                               <?php $__currentLoopData = \App\Model\Admin\State::getCanadaStates(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						   
						   <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
								</select>
								<i class="icon_pin_alt"></i>
							</div>
							
							
							
							<div class="col-lg-3">
								<select class="wide" name="filter_category[]">
									<option value="">All Categories</option>	
							   <?php if(!empty($all_cat)): ?>
                               <?php $__currentLoopData = $all_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						   
						   <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
									<?php if(!empty($category->children)): ?>
										<?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php echo e($child_cat->name); ?>

												<option value="<?php echo e($child_cat->id); ?>">--<?php echo e($child_cat->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									
									
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>	
									
								
								</select>
							</div>
							<div class="col-lg-2">
								<input type="submit" value="Search">
							</div>
						</div>
						
					</form>
					
				</div>
			</div>
		</section>
		<?php /**PATH D:\xampp\htdocs\directory\resources\views/front/layouts/home_search.blade.php ENDPATH**/ ?>