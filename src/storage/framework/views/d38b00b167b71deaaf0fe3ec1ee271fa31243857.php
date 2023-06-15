


<form id="formAuthentication" action="<?php echo e(route('auth-edit-contact')); ?>" method="POST">
  <?php echo csrf_field(); ?> 
  <input type="hidden" name="contact_id" value="<?php echo e($contact_id); ?>"> 
      <h6 class="text-center mb-4"> Edit Contact</h6>
    <div class="mb-2 mt-2">
        <label for="contact_name" class="form-label" style="font-size: 10px;" hidden>Name</label>
        <input type="text" class="form-control <?php $__errorArgs = ['contact_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_name" name="contact_name" placeholder="Name" value="<?php echo e($contact_name); ?>">
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

      <div class="mb-2">
        <label for="contact_email" class="form-label" style="font-size: 10px;" hidden>Email</label>
        <input type="text" class="form-control <?php $__errorArgs = ['contact_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_email" name="contact_email" placeholder="Email" value="<?php echo e($contact_email); ?>">
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

    <div class="mb-2">
      <label for="contact_title" class="form-label" style="font-size: 10px;" hidden>Job Title</label>
      <input type="text" class="form-control <?php $__errorArgs = ['contact_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_title" name="contact_title" placeholder="Job contact_title" value="<?php echo e($contact_title); ?>">
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

    <div class="mb-2">
      <label for="contact_phone" class="form-label" style="font-size: 10px;" hidden>Phone number</label>
      <input type="text" class="form-control <?php $__errorArgs = ['contact_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="contact_phone" name="contact_phone" placeholder="Phone" value="<?php echo e($contact_phone); ?>">
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


    <div class="text-center modal-footer ">
      <button type="submit" class="btn btn-primary btn-sm d-inline mt-3">Update</button>
      <button type="reset" class="btn btn-danger btn-sm mt-1">Clear</button>
    </div>
</form>
<!-- / ADD CONTACT FORM -->
<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/management/edit-contact-form.blade.php ENDPATH**/ ?>