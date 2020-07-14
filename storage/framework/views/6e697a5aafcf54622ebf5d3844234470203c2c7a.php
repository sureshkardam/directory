 
<?php $__env->startSection('content'); ?>

   <div class="container-fluid">
			
			
			 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Import File</li>
     </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Import File</h2>
			</div>
			
			
			<div class="row">
					
				<div class="col-sm-12">
				<div class="prog">
				<div class="progress" style="height:40px;">
				
				<?php if($errors->any()): ?>
    <div class="alert alert-danger">
     
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>
<?php endif; ?>
				
    <div class="progress-bar bg-success" style="width:30%; font-size:20px;">
    1. Upload File
    </div>
    <div class="progress-bar bg-secondary" style="width:30%; font-size:20px;">
     2. Map Fields
    </div>
    <div class="progress-bar bg-secondary" style="width:40%; font-size:20px;">
      3. Save Records
    </div>
  </div>											
				</div>
					
					
							 <form class="form-horizontal" method="POST" action="<?php echo e(route('admin.import.parse')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('csv_file') ? ' has-error' : ''); ?>">
                               
								
								
								
						<div class="col-sm-12">
                            <div class="form-group">
                                <label class="input-label">Select Product Categories <span style="color: red">*</span>
                                </label>
                               <select class="form-control select-form" name="category_id[]"  multiple required>
                                    
									<option value="">Auto Detect</option>
									<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
						
						
						<div class="col-sm-12">
                            <div class="form-group">
                                <label class="input-label">Select Website <span style="color: red">*</span>
                                </label>
                                
								 <select class="form-control select-form" name="website"  required>
                                    <?php $__currentLoopData = $websites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $website): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($website->id); ?>"><?php echo e($website->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
								
								
                            </div>
                        </div>
								
								
								
								
								
                                <div class="col-md-12">
                                    <label class="input-label">Only CSV files <span style="color: red">*</span>
                                </label>
									<input id="csv_file" type="file" class="form-control" name="csv_file" required>

                                    <?php if($errors->has('csv_file')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('csv_file')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group" style="display:none">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="header" checked> File contains header row?
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn_1 medium">
                                        Parse CSV
                                    </button>
                                </div>
                            </div>
                        </form>
			
			</div>
		</div>


	</div>
	</div>








<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/admin/upload-product/import.blade.php ENDPATH**/ ?>