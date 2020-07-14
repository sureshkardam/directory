	<header class="header_in">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
					<div id="logo">
						<a href="<?php echo e(url('/')); ?>">
							<img src="<?php echo e(asset('front/img/logo_sticky.png')); ?>" width="165" height="35" alt="" class="logo_sticky">
						</a>
					</div>
				</div>
				<div class="col-lg-9 col-12">
					<ul id="top_menu">
						<li><a href="#." class="btn_add">Add Listing</a></li>
						<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
						<!--<li><a href="#." class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>-->
					</ul>
					
					<a href="#menu" class="btn_mobile">
						<div class="hamburger hamburger--spin" id="hamburger">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</a>
	<?php echo $__env->make('front.layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
			</div>
			
	
		<div class="layer"></div>
		
		<?php echo $__env->make('front.layouts.search-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
	</header><?php /**PATH D:\xampp\htdocs\directory\resources\views/front/layouts/header-in.blade.php ENDPATH**/ ?>