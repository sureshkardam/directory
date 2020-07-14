 
<?php $__env->startSection('content'); ?>
   <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo e(route('admin.home')); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Listings</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Listings</h2>
				<div class="filter">
					<select name="orderby" class="selectbox">
						<option value="Any time">Any time</option>
						<option value="Latest">Latest</option>
						<option value="Oldest">Oldest</option>
					</select>
				</div>
			</div>
			<div class="list_general">
				<ul>
					<?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<!--<figure><img src="img/item_1.jpg" alt=""></figure>-->
						
						<?php $__currentLoopData = $listing->getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<small><?php echo e(\App\Model\Admin\Category::getName($cat->category_id)); ?></small>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<h4><?php echo e($listing->listing_title); ?></h4>
						<p><?php echo e($listing->listing_description); ?></p>
						<p><a href="#0" class="btn_1 gray"><i class="fa fa-fw fa-eye"></i> View item</a></p>
						<ul class="buttons">
							
							<li><a href="#0" class="btn_1 gray"><i class="fa fa-map-marker"></i> <?php echo e(\App\Model\Admin\State::getName($listing->getLocation->state)); ?></a></li>
						</ul>
					</li>
					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</ul>
			</div>
		</div>
		<!-- /box_general-->
		<!--<nav aria-label="...">
			<ul class="pagination pagination-sm add_bottom_30">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav>-->
		<!-- /pagination-->
	  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/admin/theme/listing/listing.blade.php ENDPATH**/ ?>