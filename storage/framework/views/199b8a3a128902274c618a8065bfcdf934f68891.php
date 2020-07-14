<div id="results">
		   <div class="container">
			   <div class="row">
				   <div class="col-lg-3 col-md-4 col-10">
					   
					   <?php if($listings): ?>
					   <h4><strong id="result_count"><?php echo e(sizeof($listings)); ?></strong> result for listing</h4>
						<?php endif; ?>
				   </div>
				   <div class="col-lg-9 col-md-8 col-2">
					   <a href="#0" class="side_panel btn_search_mobile"></a> 
						<form method="post" action="<?php echo e(url('filter/listing')); ?>">
						<?php echo csrf_field(); ?>
						<div class="row no-gutters custom-search-input-2 inner">
							<div class="col-lg-5">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="What are you looking for..." name="filter_title">
									<i class="icon_search"></i>
								</div>
							</div>
							<div class="col-lg-3">
								<select class="wide" name="filter_location[]">
									<option value="" >All Location</option>	
							  
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
							<div class="col-lg-1">
								<input type="submit">
							</div>
						</div>
						
						</form>
				   </div>
			   </div>
			 
		   </div>
		 
	   	</div>
	   <?php /**PATH D:\xampp\htdocs\directory\resources\views/front/layouts/inner_search.blade.php ENDPATH**/ ?>