<?php $__env->startSection('layoutContent'); ?>

<!-- Content -->
<?php echo $__env->yieldContent('content'); ?>
<!--/ Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/commonMaster' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sneat-html-admin-template\html-laravel-free\full-version\resources\views/layouts/blankLayout.blade.php ENDPATH**/ ?>