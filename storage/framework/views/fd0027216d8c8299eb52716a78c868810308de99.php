<div id="search_mobile">
			<a href="#" class="side_panel"><i class="icon_close"></i></a>
			<form method="post" action="<?php echo e(url('filter/listing')); ?>">
						<?php echo csrf_field(); ?>
			<div class="custom-search-input-2">
				<div class="form-group">
					<input class="form-control" type="text" placeholder="What are you looking.." name="filter_title">
					<i class="icon_search"></i>
				</div>
				<div class="form-group">
					<select class="wide" name="filter_location[]">
									<option value="" >All Location</option>	
							  
                               <?php $__currentLoopData = \App\Model\Admin\State::getCanadaStates(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						   
						   <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
								</select>
					<i class="icon_pin_alt"></i>
				</div>
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
				<input type="submit" name="Search">
			</div>
			</form>
		</div><?php /**PATH D:\xampp\htdocs\directory\resources\views/front/layouts/search-mobile.blade.php ENDPATH**/ ?>