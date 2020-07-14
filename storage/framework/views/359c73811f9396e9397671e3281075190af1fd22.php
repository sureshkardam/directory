<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>Bestbizdeal Business Listing</title>

    
    <link rel="shortcut icon" href="<?php echo e(asset('front/img/favicon.ico')); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo e(asset('front/img/apple-touch-icon-57x57-precomposed.png')); ?>">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo e(asset('front/img/apple-touch-icon-72x72-precomposed.png')); ?>">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo e(asset('front/img/apple-touch-icon-114x114-precomposed.png')); ?>">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo e(asset('front/img/apple-touch-icon-144x144-precomposed.png')); ?>">

    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   
    <link href="<?php echo e(asset('front/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('front/css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('front/css/vendors.css')); ?>" rel="stylesheet">

   
    <link href="<?php echo e(asset('front/css/custom.css')); ?>" rel="stylesheet">
	
	

</head>

<body>
		
	
	
	<?php if(Request::is('/')) 	{  ?>
	<div id="page">
	
	<?php echo $__env->make('front.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<?php }else{ ?>
	
	<div id="page" class="theia-exception">
	<?php echo $__env->make('front.layouts.header-in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php } ?>
	
	
	
	
	
	<main>
		
		 <?php echo $__env->yieldContent('content'); ?>
		
		
	</main>
	
<?php echo $__env->make('front.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

	
	</div>
	
	
<?php echo $__env->make('front.sign-up-popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('front.contact-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<div id="toTop"></div>
	
    
	<!--<script src="<?php echo e(asset('admin/vendor/jquery/jquery.min.js')); ?>"></script>-->
	<script src="<?php echo e(asset('front/js/common_scripts.js')); ?>"></script>
	<script src="<?php echo e(asset('front/js/functions.js')); ?>"></script>
	<script src="<?php echo e(asset('front/assets/validate.js')); ?>"></script>
	
	<script>
$('.filter_data').on('click', function () {	   
			
			//alert('hello');
			
			//var state=$(this).attr("data-id");
			//alert(state);
			
			//alert(state);
			var location_data = [];
            $.each($("input[name='filter_location[]']:checked"), function() {
                location_data.push($(this).val());
            });
            
            location_data = location_data.join(",");
            //ajax

            //alert(location_data);
			
			var category_data = [];
            $.each($("input[name='filter_category[]']:checked"), function() {
                category_data.push($(this).val());
            });
            
            category_data = category_data.join(",");
            //ajax

           //alert(category_data);
			
			var route = "<?php echo e(route('ajax')); ?>";
			
			//alert(route);
		
                $.ajax({
                    type: "GET",

                    url: route+"?location_data=" + location_data + "&category_data=" + category_data,
                    success: function(data) {
                        
						console.log(data.html);
						
						//$("#ajax-listing").html('');
                        //$('#ajax-success').addClass('status_select-msg');
                        //$('#ajax-success').text('Process Complete , Patients assigned for selected Clinic!');
						$('#ajax-listing').html(data.html);
                    }
                });
          
			
			
			
			
		
     });
	      
	
$('#howWorks').owlCarousel({
		center: true,
		items: 3,
		loop: true,
		margin: 15,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			767: {
				items: 2
			},
			1000: {
				items: 3
			},
			1400: {
				items: 3
			}
		}
	});	

</script>

</body>
</html><?php /**PATH D:\xampp\htdocs\directory\resources\views/front/layouts/app.blade.php ENDPATH**/ ?>