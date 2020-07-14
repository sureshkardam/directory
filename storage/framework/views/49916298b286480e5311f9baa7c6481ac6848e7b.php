 
<?php $__env->startSection('content'); ?>

      <section class="content-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                        <div class="progress" style="height:40px;">
                            <div class="progress-bar bg-success" style="width:30%; font-size:20px;">
                                1. Upload CSV File
                            </div>
                            <div class="progress-bar bg-success" style="width:30%; font-size:20px;">
                                2. Map CSV Fields
                            </div>
                            <div class="progress-bar bg-success" style="width:40%; font-size:20px;">
                                3. Save Records
                            </div>
                        </div><br>
                        <div class="my-address edd">
                            <div class="edit-account">
                                <table class="table">
                                    <center>
                                        <div class="col-sm-12 text-center">
                                            <h2>Imported Done</h2>
                                            <i class="fa fa-check" aria-hidden="true" style="font-size:50px; color:green;"></i>
                                            <br>
                                            <p style="width: 100%;">Import Complete! <?php echo e($records); ?> Listing Imported</p>
                                            <br>
                                            <br>
                                            <!--<div class="row">
                <div class="col-sm-">               
                     </div>-->
                                            <div class="col-sm-12">
                                                <a href="<?php echo e(route('admin.listing')); ?>" class="btn_1 medium">View Listing</a>
                                            </div>
                                        </div>
                                    </center>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.theme.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\directory\resources\views/admin/upload-product/success.blade.php ENDPATH**/ ?>