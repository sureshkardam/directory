 
<?php $__env->startSection('content'); ?>


 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Scraper List</li>
      </ol>
		<!-- Example DataTables Card-->
		
		<div class="col-sm-12">
               <!-- <div class="row">
                   
                    <div class="col-sm-12 text-right">
                        <a class="btn_1 medium" href="<?php echo e(route('admin.category.create')); ?>" >Create Category</a>
                    </div>
                </div>-->
		</div>
		
		
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Scraper List</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
                                    <tr>
                                        <th>Name</th>
                                      
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                  <tr>
                                    <td>
									<form action="<?php echo e(route('get.scraper.listing')); ?>" id="popForm" enctype="multipart/form-data" method="post">
									<?php echo csrf_field(); ?>
									
									<input type="text" class="form-control"  name="url" required>
									 <button type="submit" class="btn_1 medium">Get List</button>
									</form>
									
									</td> 
                                    
                                  
                              
                                    </tr>
                                  
              
                                   
                                </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
	  <!-- /tables-->
	  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/admin/scraper/list.blade.php ENDPATH**/ ?>