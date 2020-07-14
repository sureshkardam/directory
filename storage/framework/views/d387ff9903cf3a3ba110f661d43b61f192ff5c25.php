 
<?php $__env->startSection('content'); ?>
  
  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo e(route('admin.home')); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create Category</li>
		
		
      </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Create Category</h2>
			</div>
			
			
			
			 <form action="<?php echo e(route('admin.category.create')); ?>" id="popForm" enctype="multipart/form-data" method="post">
                    <?php echo csrf_field(); ?>
                    <div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                <label class="input-label">Image (Max image size 2MB)</label>

                                 <?php if(Session::has('CategoryCreateErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryCreateErrors')->get('File'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-danger position-default"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                 
								<div class="store-logo">

                                    <input type="file" id="img" class="form-control" name="image">
                                    <img width="150" id="placeholder" src="https://i.imgur.com/CRQN5cK.jpg" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">

                                <?php if(Session::has('CategoryCreateErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryCreateErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" name="name" required>
                            </div>
                            <div class="form-group col-sm-6">
                                 <?php if(Session::has('CategoryCreateErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryCreateErrors')->get('MetaDescription'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Meta Description<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="<?php echo e(old('meta_description')); ?>" name="meta_description" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                 <?php if(Session::has('CategoryCreateErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryCreateErrors')->get('SeoUrl'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Seo Url<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="<?php echo e(old('seo_url')); ?>" name="seo_url" required>
                            </div>

                            <div class="form-group col-sm-6">

                                <label class="input-label">Sort Order</label>
                                <input type="text" class="form-control" value="<?php echo e(old('sort_order')); ?>" name="sort_order">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-6">
                                 <?php if(Session::has('CategoryCreateErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryCreateErrors')->get('MetaTitle'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Meta Title<span style="color: red">*</span></label>
                                <input type="text" value="<?php echo e(old('meta_title')); ?>" class="form-control" name="meta_title" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-12">
                                <label class="input-label">Parent Category</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">Select Parent Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->category_id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-sm-12">
                                 <?php if(Session::has('CategoryCreateErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryCreateErrors')->get('Description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Description<span style="color: red">*</span></label>
                                <textarea rows="4" cols="50" class="form-control" name="description"><?php echo e(old('description')); ?></textarea required>
                            </div>
                        </div>
                     


                                              
                                              <div class="form-field-here blank_a">
                                              <input type="checkbox" name="show_on_header" id="set-on-nav-add" value="1"> 

                                                              

                                                           <label for="set-on-nav-add">Show link on Header</label>
                                                            
                                                        </div>

                        <div class="form-group row">
                            <div class="form-group form-check col-sm-12 text-center">
                               
                                <button type="submit" class="btn_1 medium">
Create Category</button>
                            </div>
                        </div>
                </form>
			
			
			
		</div>
		
		
		
	  </div>
  
<script>
       $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#img").on("change", function(e) {
		$(".pip").remove();
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\"></span>" +
            "</span>").insertAfter("#img");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
		  
		  $('#placeholder').css('display','none');
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/admin/category/create.blade.php ENDPATH**/ ?>