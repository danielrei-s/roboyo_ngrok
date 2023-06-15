<?php $__env->startSection('title', 'Forgot Password'); ?>

<?php $__env->startSection('page-style'); ?>
<!-- Page -->
<link rel="stylesheet" href="<?php echo e(secure_asset('assets/vendor/css/pages/page-auth.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Forgot Password -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="<?php echo e(secure_url('/')); ?>" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <img src="<?php echo e(secure_asset('assets/img/icons/brands/roboyo_R_12.jpg')); ?>">
              </span>
              <span class="app-brand-text demo text-body fw-bolder ">Roboyo</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Forgot Password? 🔒</h4>
          <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
          <!-- form -->
          <form id="formAuthentication" class="mb-3" action="<?php echo e(route('password.email')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php if(session('status')): ?>
                <div class="alert alert-success"> <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <p style="color:red"><?php echo e($message); ?></p>   
               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
          </form>
          <!-- /form -->
          <div class="text-center">
            <a href="<?php echo e(secure_url('auth/login-basic')); ?>" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_ngrok\resources\views/content/authentications/auth-forgot-password-basic.blade.php ENDPATH**/ ?>