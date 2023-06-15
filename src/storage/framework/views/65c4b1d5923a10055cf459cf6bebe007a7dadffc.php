<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/pages-account-settings-account.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style2 mb-2">
    <li class="breadcrumb-item active">
      <a href="<?php echo e(url('/')); ?>">Dashboard</a>
    </li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-row flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
        Account</a>
      </li>
    </ul>
      <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
              <div class="d-flex align-items-md-center px-5 gap-4" >
                  <img src="<?php echo e(asset(auth()->user()->picture)); ?>"
                      alt="<?php echo e(auth()->user()->firstName); ?> <?php echo e(auth()->user()->lastName); ?>" class="d-block rounded"
                      height="120" width="120" id="userAvatar" />
                  <div class="button-wrapper">
                      <p class="far fa-users-class fa-lg fa-fw" style="margin-right: 110px;">
                        <i class='bx bxs-user-pin'></i><b> <?php echo e(auth()->user()->sigla); ?> |</b> <?php echo e(auth()->user()->firstName); ?> <?php echo e(auth()->user()->lastName); ?>

                      </p>
                      <p><i class='bx bxs-envelope' ></i> <?php echo e(auth()->user()->email); ?></p>
                      <p><i class='bx bxs-phone' ></i> +351 <?php echo e(auth()->user()->phone); ?></p>
                  </div>
                  <div style="border-left: 2px dashed #ccc; padding-left: 100px; padding-right: 20px;">
                      <!-- Doted line a separar -->
                      <div class="button-wrapper">
                          <div class="d-flex justify-content-end gap-4">
                              <div class="d-flex flex-column ">
                                  <p class="fal fa-envelope-open-text fa-sm fa-fw">System Permissions</p>
                                  <p class="text-muted"><?php echo e($role = app('App\Role')); ?></p>
                              </div>
                              <img src="<?php echo e(asset('assets/img/roles/' . $role . '.png')); ?>" alt="role-avatar"
                                  class="d-block rounded" height="120" width="120" id="roleAvatar"
                                  style="margin-right: 75px;" />
                          </div>
                      </div>
                  </div>
              </div>
              <hr class="my-1">
              <div class="card-body">
                <!-- Accordion -->
                <div class="row">
                    <div class="col-md mb-4 mb-md-0">
                        <div class="accordion mt-3" id="accordionExample">
                          <!-- Accordion Item 1 -->
                          <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                  <button type="button" class="accordion-button collapsed"
                                      data-bs-toggle="collapse" data-bs-target="#accordionOne"
                                      aria-expanded="false" aria-controls="accordionOne">
                                      Edit Profile
                                  </button>
                              </h2>

                              <div id="accordionOne" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <!-- Account -->

                                      <!-- Form -->
                                    <h5 class="card-header">Profile Details</h5>
                                    <div class="card-body">
                                      <form id="formAuthentication" class="mb-3" action="<?php echo e(route('auth-edit-main')); ?>" method="POST" style="padding: 20px;" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="<?php echo e(asset(auth()->user()->picture)); ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />

                                        <div class="button-wrapper">
                                          <div class="input-group">
                                              <label for="picture" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                  <span class="d-none d-sm-block">Upload new photo</span>
                                                  <i class="bx bx-upload d-block d-sm-none"></i>
                                                  <input type="file" id="picture" name="picture" class="account-file-input <?php $__errorArgs = ['picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> mt-2" hidden accept="image/*" />
                                              </label>

                                              <?php $__errorArgs = ['picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                              <div class="invalid-feedback"><?php echo e($message); ?></div>
                                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                              </button>

                                            </div>
                                            <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 10Mb</p>
                                        </div>
                                      </div>
                                    </div>
                                    <hr class="my-0 mb-2">
                                        <div class="row">
                                          <div class="mb-3 col-md-6">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="firstname" name="firstname" placeholder=" First Name" value="<?php echo e(auth()->user()->firstName); ?>" autofocus>
                                            <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                              <div class="invalid-feedback"><?php echo e($message); ?></div> 
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="lastname" name="lastname" placeholder=" Last Name" value="<?php echo e(auth()->user()->lastName); ?>" autofocus>
                                            <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div> 
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="sigla" class="form-label">Sigla</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['sigla'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sigla" name="sigla" placeholder="Sigla (3 letters)" value="<?php echo e(auth()->user()->sigla); ?>" autofocus>
                                            <?php $__errorArgs = ['sigla'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                              <div class="invalid-feedback"><?php echo e($message); ?></div> 
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="role" class="form-label">Job Title</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="role" name="role" placeholder=" Job Title" value="<?php echo e(auth()->user()->role); ?>" autofocus>
                                            <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                              <div class="invalid-feedback"><?php echo e($message); ?></div> 
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="phone" class="form-label">Phone number</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" name="phone" placeholder="phone" value="<?php echo e(auth()->user()->phone); ?>" autofocus>
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div> 
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                          </div>
                                          <div class="mb-3 col-md-6">
                                            <label for="phone" class="form-label">Email</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" placeholder="email" value="<?php echo e(auth()->user()->email); ?>" autofocus>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div> 
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                          </div>

                                        </div>
                                        <div class="mt-2">
                                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                        </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                            <!-- Accordion Item 2 -->
                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button type="button" class="accordion-button collapsed"
                                  data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                  aria-expanded="false" aria-controls="accordionTwo">
                                  Change Password
                                </button>
                              </h2>
                              <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card-body">
                                      <form id="formAccountSettings" method="POST" action="<?php echo e(route('change-password')); ?>">
                                        <?php echo csrf_field(); ?>
                                          <div class="row">
                                              <div class="mb-3 col-8 mx-auto">
                                                  <label for="currentPassword" class="form-label">Current
                                                      password:</label>
                                                  <input class="form-control" type="password" id="currentPassword"
                                                      name="currentPassword" />
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
                                              <div class="mb-3 col-8 mx-auto">
                                                  <label for="newPassword" class="form-label">New
                                                      password:</label>
                                                  <input class="form-control" type="password" id="newPassword"
                                                      name="newPassword" />
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
                                              <div class="mb-3 col-8 mx-auto">
                                                  <label for="confirmPassword" class="form-label">Confirm new
                                                      password:</label>
                                                  <input class="form-control" type="password" id="confirmPassword"
                                                      name="newPassword_confirmation" />
                                              </div>
                                          </div>
                                          <div class="col-3 mx-auto">
                                              <button type="submit" class="btn btn-primary me-2">Update</button>
                                              <button type="reset"
                                                  class="btn btn-outline-secondary">Cancel</button>
                                          </div>
                                      </form>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
          <!-- /Account -->
      </div>
      <div class="card">
          <h5 class="card-header">Delete Account</h5>
          <div class="card-body">
              <div class="mb-3 col-12 mb-0">
                  <div class="alert alert-warning">
                      <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                      <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                  </div>
              </div>
              <form id="delete-user-<?php echo e(auth()->user()->id); ?>" action="<?php echo e(route('user-management.destroy', auth()->user()->id)); ?>" method="POST" onsubmit="return validateForm()">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                  <div class="form-check mb-3">
                      <input class="form-check-input" type="checkbox" name="accountActivation"
                          id="accountActivation" />
                      <label class="form-check-label" for="accountActivation">I confirm my account
                          deactivation</label>
                  </div>
                  <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
              </form>
          </div>
      </div>
  </div>
</div>
<!-- Script to make sure user checked box to delete account, if not -> popup -->
<script>
  function validateForm() {
      var checkBox = document.getElementById("accountActivation");
      if (checkBox.checked == false) {
          alert("Please confirm your account deactivation by checking the checkbox.");
          return false;
      }
  }
</script>
<script>  //show a preview of the photo about to be uploaded
  const inputPicture = document.querySelector('#picture');
  const picturePreview = document.querySelector('#picturePreview');

  inputPicture.addEventListener('change', () => {
      const file = inputPicture.files[0];
      const reader = new FileReader();

      reader.addEventListener('load', () => {
          picturePreview.setAttribute('src', reader.result);
      });

      if (file) {
          reader.readAsDataURL(file);
      }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentNavbarLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/dashboard/dashboards-main.blade.php ENDPATH**/ ?>