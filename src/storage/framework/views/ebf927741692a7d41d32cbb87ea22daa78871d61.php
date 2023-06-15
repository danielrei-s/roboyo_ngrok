<!-- Vertically Centered Modal -->

        <!-- Button trigger modal -->
        <a href="#" class="btn btn-secondary btn-action" data-bs-toggle="modal" data-bs-original-title="Edit user" data-bs-target="#modalCenter" title="Edit user profile" aria-describedby="tooltip674202">
          <i class='bx bx-edit'> Edit</i>
        </a>


        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="width: 35rem;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit <?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?>'s profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formAuthentication" class="mb-3" action="<?php echo e(route('auth-edit-basic')); ?>" method="POST" style="padding: 15px;" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?> 
                      <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>"> 
                      <div class="row justify-content-center">
                        <div class="col-md-12">
                          <div class="row justify-content-center">
                            <div class="col-md-4 mb-3">
                              <div class="d-flex justify-content-center align-items-center">
                                <label for="picture" style="cursor: pointer;">
                                  <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                    <img src="<?php echo e(secure_asset($user->picture)); ?>" alt="Profile picture" id="picturePreview" class="w-100 h-100">
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
unset($__errorArgs, $__bag); ?> mt-2" id="picture" name="picture" accept="image/*" >
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
                              <select class="form-select text-center mt-2 mb-1" name="admin" id="admin" aria-label="Select privilege" style="width: 100%;">
                                <option value="0" <?php if($user->admin == 0): ?> selected <?php endif; ?>>Pentester</option>
                                <option value="1" <?php if($user->admin == 1): ?> selected <?php endif; ?>>Manager</option>
                                <option value="2" <?php if($user->admin == 2): ?> selected <?php endif; ?>>Admin</option>
                            </select>

                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="firstname" name="firstname" placeholder=" First Name" value="<?php echo e($user->firstName); ?>" autofocus>
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

                              <div class="col-md-9 mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="lastname" name="lastname" placeholder=" Last Name" value="<?php echo e($user->lastName); ?>" autofocus>
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

                              <div class="col-md-9 mb-3">
                                <label for="sigla" class="form-label">Sigla</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['sigla'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sigla" name="sigla" placeholder="Sigla (3 letters)" value="<?php echo e($user->sigla); ?>" autofocus>
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

                              <div class="col-md-9 mb-3">
                                <label for="role" class="form-label">Job Title</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="role" name="role" placeholder="Job Title" value="<?php echo e($user->role); ?>" autofocus>
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

                              <div class="col-md-9 mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" name="phone" placeholder="phone" value="<?php echo e($user->phone); ?>" autofocus>
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

                              <div class="col-md-9 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" placeholder=" Email" value="<?php echo e($user->email); ?>">
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
                                <button type="button" class="btn btn-outline-secondary btn-md me-3" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary">Update</button>
                              </div>
                          </div>
                        </div>
                      </div>
                    </form>
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
          });
      </script>

<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_ngrok\resources\views/content/management/edit-user.blade.php ENDPATH**/ ?>