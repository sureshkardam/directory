 
<?php $__env->startSection('content'); ?>

<style>
.bg-secondary.active {
    background-color: #28a745!important;
}
</style>

   
   <div class="container-fluid">
			
			
			 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Map Fields</li>
     </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Map Fields</h2>
			</div>
			
			
			
			
			
			<div class="row">
					
				<div class="col-sm-12">
				<div class="prog">
				<div class="progress" style="height:40px;">
    <div class="progress-bar bg-success" style="width:30%; font-size:20px;">
    1. Upload File
    </div>
    <div class="progress-bar bg-secondary active" style="width:30%; font-size:20px;">
     2. Map Fields
    </div>
    <div class="progress-bar bg-secondary" style="width:40%; font-size:20px;">
      3. Save Records
    </div>
  </div>											
				</div>
					
					<div class="my-address edd">
						<div class="edit-account">
							 <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo e(route('admin.import.process')); ?>">
    <?php echo e(csrf_field()); ?>

<input type="hidden" name="csv_data_file_id" value="<?php echo e($csv_data_file->id); ?>" />

    <div class="set-map-main">
        <?php $__currentLoopData = $csv_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="divide-div-map">
            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="loop-value-map"><?php if($value): ?><?php echo e($value); ?><?php else: ?> - <?php endif; ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="divide-div-map">
            <?php $__currentLoopData = $csv_data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="loop-value-map">
                    
					
					<select name="fields[<?php echo e($key); ?>]">
							<option value="">Select Local Field</option>
                        <?php $__currentLoopData = $mapArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $db_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($loop->index); ?>"><?php echo e($db_field); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>	
					
					
					
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<div class="col-sm-12 text-center">
    <button type="submit" class="btn_1 medium">
        Import Data
    </button>
	</div>
</form>
			</div>
		</div>


	</div>
	</div>


<style>
.set-map-main {
    display: flex;
}
.divide-div-map .loop-value-map {
    padding: 11px 10px;
}
.divide-div-map .loop-value-map:nth-child(odd) {
    background: #ececec;
}
.set-map-main .divide-div-map:nth-child(3) .loop-value-map select {
    background: #fff;
    border: solid 1px #ddd;
    padding: 8px 20px;
    border-radius: 5px;
    margin-top: -6px;
}
.set-map-main .divide-div-map:first-child .loop-value-map {
    font-weight: 600;
}
.set-map-main .divide-div-map .loop-value-map {
    height: 53px;
}
.set-map-main .divide-div-map:first-child {
    width: 40%;
}
.set-map-main .divide-div-map:nth-child(2) {
    width: 33%;
}
</style>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/admin/upload-product/map.blade.php ENDPATH**/ ?>