<?php $__env->startSection('title', 'Register Basic - Pages'); ?>

<?php $__env->startSection('page-style'); ?>
<!-- Page -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-auth.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
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

          <!-- Form inputs -->
          <h4 class="mb-2">Register here!</h4>
          <p class="mb-4">Exclusive use of cybersecurity team at Roboyo</p>

          <form id="formAuthentication" class="mb-3" action="<?php echo e(url('/auth/register-basic')); ?>" method="POST">
            <?php echo csrf_field(); ?> 

            <div class="mb-3">
              <label for="username" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname"
               placeholder="Enter your First Name" value="<?php echo e(old('firstname')); ?>" autofocus>
               <?php $__errorArgs = ['firstname'];
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
              <label for="username" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" ~
              placeholder="Enter your Last Name" value="<?php echo e(old('lastname')); ?>" autofocus>
              <?php $__errorArgs = ['lastname'];
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
              <label for="username" class="form-label">Sigla</label>
              <input type="text" class="form-control" id="sigla" name="sigla"
               placeholder="Enter your Sigla (3 letters)" value="<?php echo e(old('sigla')); ?>" autofocus>
               <?php $__errorArgs = ['sigla'];
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
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
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

            <button class="btn btn-primary d-grid w-100 ">
              Sign up
            </button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="<?php echo e(url('auth/login-basic')); ?>">
              <span>Sign in instead</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\sneat\resources\views/content/authentications/auth-register-basic.blade.php ENDPATH**/ ?>