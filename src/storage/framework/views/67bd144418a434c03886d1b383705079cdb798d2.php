

<?php $__env->startSection('title', 'Error - Pages'); ?>

<?php $__env->startSection('page-style'); ?>
<!-- Page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-misc.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!-- Error -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">Page Not Found :(</h2>
    <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
    <a href="<?php echo e(url('/')); ?>" class="btn btn-primary">Back to home</a>
    <div class="mt-3">
      <img src="<?php echo e(asset('assets/img/illustrations/page-misc-error-light.png')); ?>" alt="page-misc-error-light" width="500" class="img-fluid">
    </div>
  </div>
</div>
<!-- /Error -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/pages/pages-misc-error.blade.php ENDPATH**/ ?>