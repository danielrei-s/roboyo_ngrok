


  <form id="formAuthentication" action="<?php echo e(route('auth-register-contact')); ?>" method="POST">
    <?php echo csrf_field(); ?> 
    <input type="hidden" name="client_id" value="<?php echo e($client->id); ?>">
        <h6 class="text-center mb-4" style="font-size: .75rem; letter-spacing: 1px; color: #566a7f; margin-top: 3rem "> ADD CONTACT</h6>
      <div class="mb-2 mt-2 col-md-10 mx-auto">
          <label for="contact_name" class="form-label" style="font-size: 10px;" hidden>Name</label>
          <input type="text" class="form-control <?php $__errorArgs = ['contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_name" name="contact_name" placeholder="Name" value="<?php echo e(old('contact_name')); ?>">
          <?php $__errorArgs = ['contact_name'];
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

        <div class="mb-2 col-md-10 mx-auto">
          <label for="contact_email" class="form-label" style="font-size: 10px;" hidden>Email</label>
          <input type="text" class="form-control <?php $__errorArgs = ['contact_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_email" name="contact_email" placeholder="Email" value="<?php echo e(old('contact_email')); ?>">
          <?php $__errorArgs = ['contact_email'];
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

      <div class="mb-2 col-md-10 mx-auto">
        <label for="contact_title" class="form-label" style="font-size: 10px;" hidden>Job Title</label>
        <input type="text" class="form-control <?php $__errorArgs = ['contact_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_title" name="contact_title" placeholder="Job Title " value="<?php echo e(old('contact_title')); ?>">
        <?php $__errorArgs = ['contact_title'];
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

      <div class="mb-2 col-md-10 mx-auto">
        <label for="contact_phone" class="form-label" style="font-size: 10px;" hidden>Phone number</label>
        <input type="text" class="form-control <?php $__errorArgs = ['contact_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_phone" name="contact_phone" placeholder="Phone" value="<?php echo e(old('contact_phone')); ?>">
        <?php $__errorArgs = ['contact_phone'];
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

        <input type="hidden" name="client_id" value="<?php echo e($client->id); ?>"> 

        <div class="text-center ">
          <button type="submit" class="btn btn-primary btn-sm d-inline mt-4 mb-5">Add</button>
          <button type="reset" id="clearButton" class="btn btn-danger btn-sm mt-4 mb-5">Clear</button>
        </div>
        </form>

    <!-- / ADD CONTACT FORM -->

    <script>
      $(document).ready(function() {
        // Reset form fields on modal close
        $('#modalClientEdit').on('hidden.bs.modal', function() {
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

<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_ngrok\resources\views/content/management/add-contact-form.blade.php ENDPATH**/ ?>