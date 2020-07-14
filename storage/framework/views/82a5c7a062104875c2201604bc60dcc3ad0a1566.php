				<?php if($message = Session::get('success')): ?>
                <script>
                    $(document).ready(function() {
						$.toast({
							heading: '<?php echo e($message); ?>',
                          				
							position: 'top-center',
							icon: 'success',
							 hideAfter: 5000 
						})
					});
      
				   </script>
			    <?php endif; ?> 
				
				
				<?php if($message = Session::get('error')): ?>
                <script>
                    $(document).ready(function() {
						$.toast({
							heading: '<?php echo e($message); ?>',	
							
							position: 'top-center',
							icon: 'error',
							 hideAfter: 5000 
						})
					});
      
				   </script>
                <?php endif; ?>
				
				
				<?php if($message = Session::get('profile_success')): ?>
                <script>
                    $(document).ready(function() {
						$.toast({
							heading: '<?php echo e($message); ?>',
                          				
							position: 'top-center',
							icon: 'success',
							 hideAfter: 5000 
						})
					});
      
				   </script>
			    <?php endif; ?> 
				
				
				<?php if($message = Session::get('profile_error')): ?>
                <script>
                    $(document).ready(function() {
						$.toast({
							heading: '<?php echo e($message); ?>',	
							
							position: 'top-center',
							icon: 'error',
							 hideAfter: 5000 
						})
					});
      
				   </script>
                <?php endif; ?>
				
				
				<?php if($message = Session::get('shipping_error')): ?>
                <script>
                    $(document).ready(function() {
						$.toast({
							heading: '<?php echo e($message); ?>',	
							
							position: 'top-center',
							icon: 'error',
							 hideAfter: 5000 
						})
					});
      
				   </script>
                <?php endif; ?>
				
				
				
				<?php if($message = Session::get('register_error')): ?>
                <script>
                    $(document).ready(function() {
						$.toast({
							heading: '<?php echo e($message); ?>',	
							
							position: 'top-center',
							icon: 'error',
							 hideAfter: 5000 
						})
					});
      
				   </script>
                <?php endif; ?>
				
				
				
				
				
				
				
				
				<?php /**PATH D:\xampp\htdocs\directory\resources\views/toast.blade.php ENDPATH**/ ?>