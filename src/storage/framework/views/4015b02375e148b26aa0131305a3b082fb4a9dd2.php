<?php $__env->startSection('title', 'User Profile'); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/pages-account-settings-account.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style2 mb-2">
    <li class="breadcrumb-item">
      <a href="<?php echo e(url('/')); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      <a href="<?php echo e(route('user-management')); ?>">User Management</a>
    </li>
  </ol>
</nav>




<!-- Bootstrap Dark Table -->
<div class="card">
  <h5 class="card-header d-flex justify-content-between align-items-center">
    <span>All Users</span>
    <div class="align-items-left">
      <?php $__env->startComponent('content.management.create-user'); ?>
      <?php echo $__env->renderComponent(); ?>
    </div>
  </h5>
  <!-- /Add user modal -->

  <div class="table-responsive text-nowrap">
    <table class="table table-dark" style="min-height: 240px;">  <!-- min height prevent overlaps when there are < 2 entries -->
      <thead>
        <tr>
          <th> Picture </th>
          <th class="sortable" data-sort-by="firstName">Name</th>
          <th class="sortable" data-sort-by="email">Email</th>
          <th class="sortable" data-sort-by="sigla">Initials</th>
          <th class="sortable" data-sort-by="admin">Privileges</th>
          <th class="sortable" data-sort-by="role">Job Title</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $__currentLoopData = $userObjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><img src="<?php echo e(asset($user->picture)); ?>" alt="<?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?>"
               class="rounded-circle" style="width: 50px; height: 50px;"></td>
            <td><?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->sigla); ?></td>
            <td>
              <?php if(!$user->ativo): ?>
                  <span class="badge bg-label-dark me-1">Blocked 🚫</span>
              <?php elseif($user->admin == 2): ?>
                  <span class="badge bg-label-warning me-1">Admin</span>
              <?php elseif($user->admin == 1): ?>
                  <span class="badge bg-label-info me-1">Manager</span>
              <?php else: ?>
                  <span class="badge bg-label-primary">Pentester</span>
              <?php endif; ?>
            </td>
            <td><?php echo e($user->role); ?></td>
            <td><div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
              data-bs-toggle="dropdown"data-user-id="<?php echo e($user->id); ?>">
                <i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">

                
                <a class="dropdown-item" href="<?php echo e(route('user.profile', ['id' => $user->id])); ?>"
                data-bs-toggle="tooltip" aria-label="View User Profile"
                data-bs-original-title="View User Profile" aria-describedby="tooltip674202">
                <i class="bx bx-show-alt me-1" title="View Profile"></i> View</a>

                
                <form method="POST" action="<?php echo e(route('users.forcePasswordReset', ['user' => $user->id])); ?>" id="forcepasswordreset-form-<?php echo e($user->id); ?>">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                  <button type="submit" class="dropdown-item" data-bs-toggle="tooltip"
                           data-bs-original-title="<?php if($user->force_password_reset == 0): ?> Force password reset <?php else: ?> Already forced! <?php endif; ?>"
                          aria-describedby="tooltip674202"
                          onclick="return confirmpasswordReset()">
                      <?php if($user->force_password_reset == 0): ?>
                          <i class="bx bx-lock me-1"></i> Password
                      <?php else: ?>
                          <i class="bx bx-lock-open-alt me-1"></i> Already Forced!
                      <?php endif; ?>
                  </button>
                  <input type="hidden" name="ativo" value="0">
              </form>

                
                <form method="POST" action="<?php echo e(route('users.block', ['user' => $user->id])); ?>" id="block-form-<?php echo e($user->id); ?>">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                  <button type="submit" class="dropdown-item" data-bs-toggle="tooltip"
                           data-bs-original-title="<?php if($user->ativo == 1): ?> Block user <?php else: ?> Unblock User <?php endif; ?>"
                          aria-describedby="tooltip674202"
                          onclick="return confirmBlock()">
                      <?php if($user->ativo == 1): ?>
                          <i class="bx bx-block me-1"></i> Block
                      <?php else: ?>
                          <i class="bx bx-lock-open-alt me-1"></i> Unblock
                      <?php endif; ?>
                  </button>
                  <input type="hidden" name="ativo" value="0">
              </form>

                
                <a class="dropdown-item" href="#"  data-bs-toggle="tooltip"
                data-bs-original-title="Delete user"
                aria-describedby="tooltip674202"
                onclick="event.preventDefault();
                  if (confirm('Are you sure you want to delete <?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?> ?'  )) {
                    document.getElementById('delete-user-<?php echo e($user->id); ?>').submit();
                  }">
                  <i class="bx bx-trash me-1"title="Delete User"></i>Delete
                </a>
                <form id="delete-user-<?php echo e($user->id); ?>" action="<?php echo e(route('user-management.destroy', $user->id)); ?>" method="POST" style="display: none; ">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(asset('assets/js/table-sort.js')); ?>"></script>
      </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
    <?php echo e($users->links('pagination::bootstrap-4')); ?>

    </div>
  </div>
</div>
<!--/ Bootstrap Dark Table -->
<!-- Script to open modal if there are any validation errors on submitting new user -->
  <?php if($errors->any()): ?>
    <script>
        $(document).ready(function(){
            $('#modalCenter').modal('show');
        });
    </script>
  <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentNavbarLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/management/user-management.blade.php ENDPATH**/ ?>