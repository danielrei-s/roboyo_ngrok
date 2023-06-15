<?php $__env->startSection('title', 'Client Management - Client Tables'); ?>

<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style2 mb-2">
    <li class="breadcrumb-item">
      <a href="<?php echo e(url('/')); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">
      <a href="<?php echo e(route('client-management')); ?>">Client Management</a>
    </li>
  </ol>
</nav>



<!-- Bootstrap Dark Table -->
<div class="card">
  <div class="card">
    <h5 class="card-header d-flex justify-content-between align-items-center">
      <span>All Clients</span>
      <div class="align-items-left">
        <?php $__env->startComponent('content.management.create-client', ['contactObjects' => $contactObjects, 'clients' => $clients]); ?>
        <?php echo $__env->renderComponent(); ?>
      </div>
    </h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-dark">
      <thead>
  <tr>
    <th>Logo</th>
    <th class="sortable" data-sort-by="code">
      Code
      <span class="arrow-up"></span>
      <span class="arrow-down visible"></span>
    </th>
    <th class="sortable" data-sort-by="name">
      Name
      <span class="arrow-up"></span>
      <span class="arrow-down visible"></span>
    </th>
    <th class="sortable" data-sort-by="address">
      Address
      <span class="arrow-up"></span>
      <span class="arrow-down visible"></span>
    </th>
    <th>Actions</th>
  </tr>
</thead>
      <tbody class="table-border-bottom-0">
        <?php $__currentLoopData = $clientObjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><img src="<?php echo e(asset($client->logo)); ?>" alt="<?php echo e($client->name); ?>" class="rounded-circle" style="width: 50px; height: 50px;"></td>
          <td><b><?php echo e($client->code); ?></b></td>
          <td class="text-truncate" style="max-width: 200px;"><?php echo e($client->name); ?></td>
          <td class="text-truncate" style="max-width: 200px;"><?php echo e($client->address); ?></td>
          <td>

                
            <a class="btn p-0" href="#"  data-bs-toggle="tooltip"
                data-bs-original-title="Delete client"
                aria-describedby="tooltip674202"
                onclick="event.preventDefault();
                  if (confirm('Are you sure you want to delete <?php echo e($client->name); ?>?'  )) {
                    document.getElementById('delete-client-<?php echo e($client->id); ?>').submit();
                  }">
                  <i class="bx bx-trash me-1"title="Delete Client" style="font-size: 26px;"></i>
                </a>
                <form id="delete-client-<?php echo e($client->id); ?>" action="<?php echo e(route('client-management.destroy', $client->id)); ?>" method="POST" style="display: none; ">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                </form>

                
            <a class="btn p-0" href="<?php echo e(route('client.profile', ['id' => $client->id])); ?>" data-bs-toggle="tooltip" data-bs-original-title="View client" aria-describedby="tooltip674202">
              <i class="bx bx-show-alt me-1 " title="View Client" style="font-size: 26px;"></i>
            </a>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(asset('assets/js/table-sort.js')); ?>"></script>
      </tbody>
    </table>
  </div>
  <div class="d-flex justify-content-center mt-3">
    <?php echo e($clients->links('pagination::bootstrap-4')); ?>

    </div>
</div>
<?php if($errors->any()): ?>
    <script>
        $(document).ready(function(){
            $('#modalToggle').modal('show');
        });
    </script>
  <?php endif; ?>
<!--/ Bootstrap Dark Table -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentNavbarLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/management/client-management.blade.php ENDPATH**/ ?>