<!-- Vertically Centered Modal -->
<div class="col-lg-4 col-md-6">
    <div class="mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalCenter" title="Add User">
          <i class='bx bxs-user-plus' style='font-size: 30px'></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Create new user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formAuthentication" class="mb-3" action="<?php echo e(route('auth-register-basic')); ?>" method="POST" style="padding: 20px;" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?> 

                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <div class="d-flex justify-content-center align-items-center">
                            <label for="picture" style="cursor: pointer;">
                              <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                <img src="assets/img/avatars/5.png" alt="Profile picture" id="picturePreview" class="w-100 h-100">
                              </div>
                            </label>
                          </div>
                          <input type="file" class="form-control <?php $__errorArgs = ['picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> mt-2" id="picture" name="picture" accept="image/*">
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
                          <div class="text-center mt-1">
                          <label for="admin" class="mt-2 mb-1">Privileges</label>
                          </div>
                          <select class="form-select text-center mt-2 mb-1" name="admin" id="admin" aria-label="Selec privilege" style="width: 100%;">
                            <option value="0">Pentester</option>
                            <option value="1">Manager</option>
                            <option value="2">Admin</option>
                          </select>
                        </div>

                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="firstname" name="firstname" placeholder=" First Name" value="<?php echo e(old('firstname')); ?>" autofocus>
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


                              <div class="col-md-6 mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="lastname" name="lastname" placeholder=" Last Name" value="<?php echo e(old('lastname')); ?>" autofocus>
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

                              <div class="col-md-6 mb-3">
                                <label for="sigla" class="form-label">Sigla</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['sigla'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sigla" name="sigla" placeholder="Sigla (3 letters)" value="<?php echo e(old('sigla')); ?>" autofocus>
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

                              <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">Job Title</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="role" name="role" placeholder="Job Title" value="<?php echo e(old('role')); ?>" autofocus>
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

                              <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" placeholder=" Email" value="<?php echo e(old('email')); ?>">
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
                              <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-secondary btn-md me-3 mt-2" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary mt-2">Sign up</button>
                              </div>
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

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
    $('#modalCenter').on('hidden.bs.modal', function() {
      picturePreview.setAttribute('src', 'assets/img/avatars/5.png'); // Clear the image preview by setting the 'src' attribute to our "insert avatar"
    });
  });

  $(document).ready(function() {
  // Reset form fields on modal close
    $('#modalCenter').on('hidden.bs.modal', function() {
      setTimeout(function() {
          $('#formAuthentication .is-invalid').removeClass('is-invalid'); // Remove 'is-invalid' class from form fields
          $('#formAuthentication .invalid-feedback').remove(); // Remove all elements with the class 'invalid-feedback'
          $('#formAuthentication input[type="text"]').val('');// Clear the value of all input fields within forms that are NOT hidden (token and client id are preserved)
      }, 100);
    });
  });

  $(document).ready(function() {
    $('#clearButton').on('click', function() {
        setTimeout(function() {
          $('#formAuthentication :input:not(:hidden)').val('');
          $('#formAuthentication .is-invalid').removeClass('is-invalid'); // Remove 'is-invalid' class from form fields
          $('#formAuthentication .invalid-feedback').remove(); // Remove all elements with the class 'invalid-feedback'
        }, 100);
    });
  });

</script>
<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/management/create-user.blade.php ENDPATH**/ ?>