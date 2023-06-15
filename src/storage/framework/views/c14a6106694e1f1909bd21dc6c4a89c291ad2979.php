
 


                    <!-- Contact table -->
                <div class="col-md-10">
                  <div class="table-responsive text-nowrap">
                    <h5 class="text-center mb-4"><?php echo e($client->name); ?>'s contacts list</h5>
                    <table class="table table-bordered table-sm"  data-page="1" data-page-size="3" data-current-page="1">
                      <thead>
                        <tr>
                            <th class="sortable" data-sort-by="name">Name</th>
                            <th class="sortable" data-sort-by="email">Email</th>
                            <th class="sortable" data-sort-by="title">Title</th>
                            <th class="sortable" data-sort-by="phone">Phone</th>
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
                    <div class="d-flex justify-content-center align-items-center mt-3 gap-4">
                      <button type="button" class="btn btn-primary">Edit</button>
                      <button type="button" class="btn btn-danger">Remove</button>
                    </div>
          <!-- /Contact table -->
                  </div>
                  <!-- /BODY DIV-->
            </div>
        </div>
    </div>
<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/management/create-contact.blade.php ENDPATH**/ ?>