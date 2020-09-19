 
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo e(route('admin.home')); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Edit Category</li>
		
		
      </ol>
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Edit Category</h2>
			</div>
			
			<form action="<?php echo e(route('admin.category.edit',['id'=>$category_data->id])); ?>" id="popForm" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                   

                        
						<div class="form-group row">
                            <div class="form-group col-sm-6">
                                <label class="input-label img-categ">Image (Max image size 2MB)</label>
                                 <?php if(Session::has('CategoryeditErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryeditErrors')->get('File'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger "><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
								
								<div class="store-logo">
								<?php if($category_data->image): ?>
                                <img  id="placeholder" width="100px" src="<?php echo e(url('/')); ?>/<?php echo e($category_data->image); ?>">
								<?php else: ?>
                                   
                                    <img width="150"  id="placeholder" src="https://i.imgur.com/CRQN5cK.jpg">
								<?php endif; ?>
									 <input type="file" id="img" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
						
						
						
						
                       
                        <div class="form-group row">

                        <div class="form-group col-sm-6">
						                  <?php if(Session::has('CategoryeditErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryeditErrors')->get('Name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo e($category_data->name); ?>" required>
                            </div>

                            <div class="form-group col-sm-6">
							<?php if(Session::has('CategoryeditErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryeditErrors')->get('MetaDescription'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <label class="input-label">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" value="<?php echo e($category_data->meta_description); ?>" required>
                            </div>                      
                        </div>
                              
                                <div class="form-group row">
                        <div class="form-group col-sm-6">
                       
                     <?php if(Session::has('CategoryeditErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryeditErrors')->get('SeoUrl'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                               
                                <label class="input-label">Seo Url<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="<?php echo e($category_data->seo_url); ?>" name="seo_url" required>
                            </div>

                                <div class="form-group col-sm-6">
                                        
                                <label class="input-label">Sort Order<span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="<?php echo e($category_data->sort_order); ?>" name="sort_order">
                            </div>
                        </div>

                           


                            <div class="form-group row">
                           <div class="form-group col-sm-6">
                        <?php if(Session::has('CategoryeditErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryeditErrors')->get('MetaTitle'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                               
                                <label class="input-label">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="<?php echo e($category_data->meta_title); ?>" required>
                            </div>
                            
                                <div class="form-group col-sm-6">
                     
					 
					 
					 
					 
					 
                                <label class="input-label">Status</label>
                                <select name="status" class="form-control">
                                   
                        <option <?php if($category_data->status == 1): ?> selected <?php endif; ?> value="1" >Active</option>
                        <option <?php if($category_data->status == 0): ?> selected <?php endif; ?> value="0">Inactive</option>
                                    
                                        
                                   
                                </select>
                                
                            </div>


                      
                 
                        </div>
                 

                      
                 
                         <div class="form-group row">
                         <div class="form-group col-sm-12">
                            
                                <label class="input-label">Parent Category</label>
                                <select name="parent_id" class="form-control" required>
                                    <option value="0">Select Parent Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <option value="<?php echo e($category->category_id); ?>" <?php if($category_data->parent_id==$category->category_id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </select>
                                
                            </div>
                        </div>
                     
                 
                           <div class="form-group row">
                        <div class="form-group col-sm-12">
                             <?php if(Session::has('CategoryeditErrors')): ?>
                                    <?php $__currentLoopData = Session::get('CategoryeditErrors')->get('Description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <span class="label label-danger"><?php echo e($errorMessage); ?></span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            <label for="first name" style="top:-20px" class="hello">Description
                           <span style="color: red">*</span>
                            </label>
                           <!--  <input type="text" class="form-control" id="description" value="<?php echo e($category_data->description); ?>" 
                                name="description" placeholder=""> -->
                                <textarea rows="4" cols="50" class="form-control" name="description"><?php echo e($category_data->description); ?></textarea required>
                               

                        </div>
                        </div>

                        <div class="form-field-here blank_a">
                               <input type="checkbox" name="show_on_header" id="set-on-nav" value="1" 

                               <?php if($category_data->show_on_header ): ?>checked  value="1" <?php else: ?> value="0" <?php endif; ?>> 





                               <label for="set-on-nav">Show link on Header</label>
                                                            
                                                        </div>





                      <div class="form-group row">

                        <div class="col-sm-12">
                            <div class="form-group form-check col-sm-12 text-center">
                         
                           <button type="submit" class="btn_1 medium">Update</button>
                        </div>
                        </div>
						</div>


                            

                    
                     </form>
			
			 
		</div>
		
		
		
	  </div>
	  <style>
	  .store-logo > img{
		  width:150px;
		  height:150px;
	  }
	  .imageThumb
	  {
		 width:150px;
		  height:150px; 
	  }
	  </style>
	  
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
<?php echo $__env->make('admin.theme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>