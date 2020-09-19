 
<?php $__env->startSection('content'); ?>

   <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">CSV List</li>
      </ol>
		<!-- Example DataTables Card-->
		
		<div class="col-sm-12">
                <div class="col-sm-12 text-right">
                   
                  
                        <a class="btn_1 medium" href="<?php echo e(route('admin.file.import')); ?>" >Import Listing</a>
                   
                </div>
		</div>
		
		
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> CSV List</div>
        <div class="card-body">
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
               <tr>
                                    <th>File Name</th>
                                    <th>Date</th>
                                    <th>Products</th>
                                    <th>Status</th>
                                    <th>Download</th>
                                </tr>
              </thead>
              
              <tbody>
                <?php $__currentLoopData = $imports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $import): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
								<tr>
                                    <td><?php echo e(Str::limit($import->csv_filename, 40,'..')); ?></td>
									
									
									
									
                                    <td><?php echo e(date('M\. d\, Y\,h\:i\:s\,', strtotime($import->created_at))); ?></td>
                                    <td><?php echo e($import->records); ?></td>
                                    <td>
                                       
                                           <?php if($import->status=='1'): ?> Complete 
										   <?php else: ?>
											In Process   
										   <?php endif; ?> 
                                           
                                       
                                    </td>
                                    <td><a href="#." target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
	  <!-- /tables-->
	  </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.theme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/admin/upload-product/list.blade.php ENDPATH**/ ?>