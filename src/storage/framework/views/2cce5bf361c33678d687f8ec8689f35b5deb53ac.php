

<?php $__env->startSection('title', 'Under Maintenance - Pages'); ?>

<?php $__env->startSection('page-style'); ?>
<!-- Page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-misc.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--Under Maintenance -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">Under Maintenance!</h2>
    <p class="mb-4 mx-2">
      Sorry for the inconvenience but we're performing some maintenance at the moment
    </p>
    <a href="<?php echo e(url('/')); ?>" class="btn btn-primary">Back to home</a>
    <div class="mt-4">
      <img src="<?php echo e(asset('assets/img/illustrations/girl-doing-yoga-light.png')); ?>" alt="girl-doing-yoga-light" width="500" class="img-fluid">
    </div>
  </div>
</div>
<!-- /Under Maintenance -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sneat-html-admin-template\html-laravel-free\full-version\resources\views/content/pages/pages-misc-under-maintenance.blade.php ENDPATH**/ ?>