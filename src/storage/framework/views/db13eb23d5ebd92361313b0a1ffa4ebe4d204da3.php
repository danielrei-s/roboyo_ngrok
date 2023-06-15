
<!-- Toggle Between Modals -->
<div class="col-lg-4 col-md-6">
  <div class="mt-3">
    <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalToggle" title="Add Client">
      <i class='bx bxs-folder-plus' style='font-size: 30px'></i>
    </button>

    <!-- Modal 1-->
    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalToggleLabel">Add new client</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formAuthentication" class="mb-3" action="<?php echo e(route('auth-register-client')); ?>" method="POST" style="padding: 10px;" enctype="multipart/form-data">
              <?php echo csrf_field(); ?> 
              <div class="row">
                <div class="col-md-4">
                  <div class="d-flex justify-content-center align-items-center mb-3">
                      <label for="picture" style="cursor: pointer;">
                          <div class="overflow-hidden rounded" style="width: 157px; height: 157px;">
                              <img src="<?php echo e(secure_asset('assets/img/clients/default.png')); ?>" alt="Profile picture" id="picturePreview" class="w-100 h-100">
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
unset($__errorArgs, $__bag); ?> mt-2" id="picture" name="picture" accept="image/*" style="display: none;">
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

                  <div class="button-wrapper d-flex justify-content-center">
                    <label for="picture" class="btn btn-primary mb-2" tabindex="0">
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <span class="d-none d-sm-block  px-1">Upload logo&nbsp;│<i class="bx bxs-folder-open" style="font-size: 1.2em;"></i></span>
                    </label>
                    <input type="file" id="picture" name="picture" accept="image/*" onchange="updateFileName(this)" style="display: none;">
                  </div>

                  <p class="text-muted mb-0 text-center mt-2 small">Allowed JPG or PNG. Max size of 10Mb</p>
              </div>
                  <div class="col-md-8">
                      <div class="row">
                          <div class="col-md-6 mb-4 mt-5">
                              <label for="name" class="form-label">Company Name</label>
                              <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>" autofocus>
                              <?php $__errorArgs = ['name'];
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

                            <div class="col-md-6 mb-4 mt-5">
                              <label for="tin" class="form-label">TIN</label>
                              <input type="text" class="form-control <?php $__errorArgs = ['tin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tin" name="tin" placeholder="Code (9 numbers)" value="<?php echo e(old('tin')); ?>" autofocus>
                                <?php $__errorArgs = ['tin'];
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

                            <div class="col-md-6 mb-4">
                              <label for="address" class="form-label">Address</label>
                              <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" name="address" placeholder=" Address" value="<?php echo e(old('address')); ?>" autofocus>
                              <?php $__errorArgs = ['address'];
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

                            <div class="col-md-6 mb-4">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" name="phone" placeholder=" Phone" value="<?php echo e(old('phone')); ?>">
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
                          </div>
                        </div>
                      </div>
                    
                </form>
                  </div>
                  <div class="modal-footer">

                    <div class="d-flex justify-content-end">
                      <button type="button" class="btn btn-outline-secondary btn-md me-2" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary">Sign up</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal 2-->
              

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
    $('#modalToggle').on('hidden.bs.modal', function() {
      picturePreview.setAttribute('src', 'assets/img/clients/default.png'); // Clear the image preview by setting the 'src' attribute to our "insert avatar"
    });
  });

  $(document).ready(function() {
  // Reset form fields on modal close
    $('#modalToggle').on('hidden.bs.modal', function() {
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



  function updateFileName(input) {
        var selectedFile = input.files[0];
        var selectedFileName = selectedFile ? selectedFile.name : "N/A";
        document.getElementById("selectedFile").value = selectedFileName;
    }
</script>

<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_ngrok\resources\views/content/management/create-client.blade.php ENDPATH**/ ?>