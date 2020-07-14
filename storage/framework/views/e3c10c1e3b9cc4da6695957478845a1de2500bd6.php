<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Ikozy')); ?></title>
	<style>
.text-right a.btn_1.medium {
    margin-bottom: 10px;
}
</style>
  <!-- Favicons-->
  <link rel="shortcut icon" href="<?php echo e(asset('admin/img/favicon.ico')); ?>" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo e(asset('admin/img/apple-touch-icon-57x57-precomposed.png')); ?>">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo e(asset('admin/img/apple-touch-icon-72x72-precomposed.png')); ?>">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo e(asset('admin/img/apple-touch-icon-114x114-precomposed.png')); ?>">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo e(asset('admin/img/apple-touch-icon-144x144-precomposed.png')); ?>">
	
  <!-- Bootstrap core CSS-->
  <link href="<?php echo e(asset('admin/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Main styles -->
  <link href="<?php echo e(asset('admin/css/admin.css')); ?>" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="<?php echo e(asset('admin/vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="<?php echo e(asset('admin/vendor/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="<?php echo e(asset('admin/css/custom.css')); ?>" rel="stylesheet">
  
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" rel="stylesheet">
  
  
  
   <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('admin/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('admin/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo e(asset('admin/vendor/chart.js/Chart.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendor/datatables/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendor/datatables/dataTables.bootstrap4.js')); ?>"></script>
	<script src="<?php echo e(asset('admin/vendor/jquery.selectbox-0.2.js')); ?>"></script>
	<script src="<?php echo e(asset('admin/vendor/retina-replace.min.js')); ?>"></script>
	<script src="<?php echo e(asset('admin/vendor/jquery.magnific-popup.min.js')); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('admin/js/admin.js')); ?>"></script>
	<!-- Custom scripts for this page-->
    <script src="<?php echo e(asset('admin/js/admin-charts.js')); ?>"></script>
	
	<script src="<?php echo e(asset('admin/js/admin-datatables.js')); ?>"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
  
  
  
  
  
  
  
  
	
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
<?php echo $__env->make('admin.theme.layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  <!-- /Navigation-->
  <div class="content-wrapper">
   <?php echo $__env->make('toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
   <?php echo $__env->yieldContent('content'); ?>
   
	
   	</div>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © SPARKER 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo e(route('admin.logout')); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
   
	
	
	
	
</body>
</html>
<?php /**PATH D:\xampp\htdocs\directory\resources\views/admin/theme/layouts/app.blade.php ENDPATH**/ ?>