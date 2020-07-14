<nav id="menu" class="main-menu">
		    <ul>
		        
				
				
				
				
				 <?php if(!empty($all_cat)): ?>
                               <?php $__currentLoopData = $all_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				<li><span><a href="<?php echo e(url('category',$category->seo_url)); ?>"><?php echo e($category->name); ?> </a></span>
		            
					<?php if(!empty($category->children)): ?>
					<ul>
		                <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="<?php echo e(url('category',$child_cat->seo_url)); ?>"><?php echo e($child_cat->name); ?> (<?php echo e(\App\Model\Admin\Category::getListingsCount($child_cat->seo_url)); ?>)</a></li>
		                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </ul>
					<?php endif; ?>
		        </li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				
		    </ul>
		</nav><?php /**PATH D:\xampp\htdocs\directory\resources\views/front/layouts/nav.blade.php ENDPATH**/ ?>