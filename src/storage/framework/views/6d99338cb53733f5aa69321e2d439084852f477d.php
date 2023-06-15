<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="<?php echo e(secure_asset('/assets') . '/'); ?>" data-base-url="<?php echo e(secure_url('/')); ?>" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?php echo $__env->yieldContent('title'); ?> | Roboyo PenTest Reporting Tool </title>
  <meta name="description" content="<?php echo e(config('variables.templateDescription') ? config('variables.templateDescription') : ''); ?>" />
  <meta name="keywords" content="<?php echo e(config('variables.templateKeyword') ? config('variables.templateKeyword') : ''); ?>">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <!-- Canonical SEO -->
  <link rel="canonical" href="<?php echo e(config('variables.productPage') ? config('variables.productPage') : ''); ?>">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo e(secure_asset('assets/img/favicon/favicon2.ico')); ?>" />
  <!-- font awsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-6aCgIc2M/vq+Zg6CCfYoiYsT6RkT+IKyf6UgT6Uz+ByvNLX9AsDoxhqwEmJpF1dqs4+4Lxvh4B2QGgJSJFZ1hQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- load jQuery from a CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Include Styles -->
  <?php echo $__env->make('layouts/sections/styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Include Scripts for customizer, helper, analytics, config -->
  <?php echo $__env->make('layouts/sections/scriptsIncludes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
  <!-- Layout Content -->
  <?php echo $__env->yieldContent('layoutContent'); ?>
  <!--/ Layout Content -->
  <!-- Include Scripts -->
  <?php echo $__env->make('layouts/sections/scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_ngrok\resources\views/layouts/commonMaster.blade.php ENDPATH**/ ?>