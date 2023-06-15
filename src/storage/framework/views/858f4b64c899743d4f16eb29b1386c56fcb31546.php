<!-- Vertically Centered Modal -->


      <form id="formAuthentication" class="mb-3" action="<?php echo e(route('auth-edit-client')); ?>" method="POST" style="padding: 30px;"
          enctype="multipart/form-data">
          <?php echo csrf_field(); ?> 
          <input type="hidden" name="client_id" value="<?php echo e($client->id); ?>"> 
          <div class="row">
              <div class="col-md-4 mb-3">
                  <div class="d-flex justify-content-center align-items-center">
                      <label for="picture" style="cursor: pointer;">
                          <div class="rounded-circle overflow-hidden" style="width: 190px; height: 190px;">
                              <img src="<?php echo e(asset($client->logo)); ?>" alt="Profile picture" id="picturePreview"
                                  class="w-100 h-100">
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
unset($__errorArgs, $__bag); ?> mt-2" id="picture"
                      name="picture" accept="image/*">
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
              </div>
              <div class="col-md-7 mb-3">
                  <div class="row">
                      <div class="col-md-7 mb-3">
                          <label for="name" class="form-label">Company name</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                              name="name" placeholder=" First Name" value="<?php echo e($client->name); ?>" autofocus>
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
                      <div class="col-md-5 mb-3">
                          <label for="tin" class="form-label">TIN</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['tin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tin"
                              name="tin" placeholder="tin (9 numbers)" value="<?php echo e($client->tin); ?>" autofocus>
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

                      <div class="col-md-7 mb-3">
                          <label for="phone" class="form-label">Phone number</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone"
                              name="phone" placeholder="phone" value="<?php echo e($client->phone); ?>" autofocus>
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

                      <div class="col-md-5 mb-3">
                          <label for="code" class="form-label">Code</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="code"
                              name="code" placeholder=" Code" value="<?php echo e($client->code); ?>" autofocus>
                          <?php $__errorArgs = ['code'];
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

                      <div class="col-md-7 mb-3">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address"
                              name="address" placeholder=" Email" value="<?php echo e($client->address); ?>">
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

                      <div class="col-md-5 mt-4 d-flex justify-content-center align-items-start">
                          <button class="btn btn-primary btn-md">Update</button>
                      </div>
                  </div>
              </div>
          </div>
      </form>
    






<!-- Show the "Add Contact" component if $contact is not set -->





<script>
    //show a preview of the photo about to be uploaded
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





<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/management/edit-client.blade.php ENDPATH**/ ?>