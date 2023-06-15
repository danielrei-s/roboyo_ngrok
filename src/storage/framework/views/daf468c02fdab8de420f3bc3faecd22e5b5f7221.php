<div>
  <div class="d-flex align-items-center">
      <input type="text" wire:model="search" placeholder="Search contacts by name..." class="form-control">
      <div class="dropdown ml-2">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="sort-by" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sort by <?php echo e(ucfirst($sortBy)); ?>

          </button>
          <div class="dropdown-menu" aria-labelledby="sort-by">
              <a class="dropdown-item" href="#" wire:click.prevent="sortBy('name')">Name</a>
              <a class="dropdown-item" href="#" wire:click.prevent="sortBy('email')">Email</a>
              <a class="dropdown-item" href="#" wire:click.prevent="sortBy('title')">Title</a>
              <a class="dropdown-item" href="#" wire:click.prevent="sortBy('phone')">Phone</a>
          </div>
      </div>
  </div>

  <table class="table table-bordered table-sm" data-page="<?php echo e($contacts->currentPage()); ?>" data-page-size="3" data-current-page="<?php echo e($contacts->currentPage()); ?>">
      <thead>
          <tr>
              <th class="sortable <?php echo e($sortBy === 'name' ? 'sort-' . $sortDirection : ''); ?>" data-sort-by="name">Name</th>
              <th class="sortable <?php echo e($sortBy === 'email' ? 'sort-' . $sortDirection : ''); ?>" data-sort-by="email">Email</th>
              <th class="sortable <?php echo e($sortBy === 'title' ? 'sort-' . $sortDirection : ''); ?>" data-sort-by="title">Title</th>
              <th class="sortable <?php echo e($sortBy === 'phone' ? 'sort-' . $sortDirection : ''); ?>" data-sort-by="phone">Phone</th>
          </tr>
      </thead>
      <tbody class="table-border-bottom-0" id="contacts-table">
          <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($contact->name); ?></td>
              <td><?php echo e($contact->email); ?></td>
              <td><?php echo e($contact->title); ?></td>
              <td><?php echo e($contact->phone); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
  </table>

  <div class="d-flex justify-content-center align-items-center mt-3">
      <?php echo e($contacts->links()); ?>

  </div>

</div>
<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/livewire/contacts-table.blade.php ENDPATH**/ ?>