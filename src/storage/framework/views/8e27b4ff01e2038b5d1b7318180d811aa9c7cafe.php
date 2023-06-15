<?php $__env->startSection('title', 'Login Basic - Pages'); ?>

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
          <p class="mb-4">Please sign-in to your account.</p>
          <!-- Form -->
          <form id="formAuthentication" class="mb-3" action="/login" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email"
              placeholder="Enter your email" value="<?php echo e(old('email')); ?>">
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
            
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="<?php echo e(url('auth/forgot-password-basic')); ?>">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" 
                name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                 aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              <?php $__errorArgs = ['password'];
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

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>

            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on our platform?</span>
            <a href="<?php echo e(url('auth/register-basic')); ?>">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\sneat\resources\views/content/authentications/auth-login-basic.blade.php ENDPATH**/ ?>