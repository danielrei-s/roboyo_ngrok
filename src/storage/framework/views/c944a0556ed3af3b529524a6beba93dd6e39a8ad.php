<?php $__env->startSection('title', 'Force Password Reset'); ?>

<?php $__env->startSection('page-style'); ?>
<!-- Page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-auth.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="<?php echo e(url('/')); ?>" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <img src="<?php echo e(asset('assets/img/icons/brands/roboyo_R_12.jpg')); ?>">
              </span>
              <span class="app-brand-text demo text-body fw-bolder ">Roboyo</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2 text-center">PenTest Reporting Tool</h4>
          <p class="mb-4 text-center">Password change for <span class="fw-bold"><?php echo e(auth()->user()->email); ?></span>.</p>
          <!-- Form -->
          <form id="formpasswordReset" method="POST" action="<?php echo e(route('force-password-reset')); ?>">
            <?php echo csrf_field(); ?>
              <div class="row">
                  <div class="mb-3 col-12 mx-auto">
                      <label for="currentPassword" class="form-label">Current password:</label>
                      <input class="form-control" type="password" id="currentPassword" name="currentPassword" required>
                      <?php $__errorArgs = ['currentPassword'];
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
                  <div class="mb-3 col-12 mx-auto">
                      <label for="newPassword" class="form-label">New password:</label>
                      <input class="form-control" type="password" id="newPassword" name="newPassword" required>
                      <?php $__errorArgs = ['newPassword'];
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
                  <div class="mb-3 col-12 mx-auto">
                      <label for="newPassword_confirmation" class="form-label">Confirm new password:</label>
                      <input class="form-control" type="password" id="newPassword_confirmation" name="newPassword_confirmation" required> 
                  </div>
              </div>
              <div class="col-6 mx-auto">
                  <button type="submit" class="btn btn-primary d-grid w-100">Update password</button>
              </div>

          </form>
          <div class="text-center mt-3">
            <a href="<?php echo e(route('logout')); ?>"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"> ⬅ Back to Login page
            </a>
          </div>


          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
          </form>

        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
  <?php echo $__env->make('layouts/sections/footer/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/authentications/auth-reset-password.blade.php ENDPATH**/ ?>