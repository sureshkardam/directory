 
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('front.layouts.inner_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
</div>
		


<div class="container margin_60_35">
			<div class="row">
			
			<!--<?php echo $__env->make('front.layouts.left-navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
			
			<div class="col-lg-12" id="ajax-listing">
					
					
					<?php echo $__env->make('front.list-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
			
				</div>

</div>
</div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/front/list.blade.php ENDPATH**/ ?>