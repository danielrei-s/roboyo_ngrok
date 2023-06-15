<!-- Load jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<!-- Load Tabledit plugin -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" async ></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" async ></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js" async ></script>



<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['data']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['data']); ?>
<?php foreach (array_filter((['data']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<body>
<div class="container">
  <div class="table-responsive text-nowrap p-3">
    
      <?php if($data->isEmpty()): ?>
        <p class="text-center">This client has no contacts associated.</p>
      <?php else: ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <?php echo csrf_field(); ?>
        <table id="editable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Title</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($row->id); ?></td>
              <td><?php echo e($row->contact_name); ?></td>
              <td><?php echo e($row->contact_title); ?></td>
              <td><?php echo e($row->contact_email); ?></td>
              <td><?php echo e($row->contact_phone); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>
</div>
</body>

<script type="text/javascript">
$(document).ready(function(){

$.ajaxSetup({
headers:{
  'X-CSRF-Token' : $("input[name=_token]").val()
}
});

$('#editable').Tabledit({
url:'<?php echo e(route("tabledit.action")); ?>',
dataType:"json",
columns:{
  identifier:[0, 'id'],
  editable:[[1, 'contact_name'], [2, 'contact_title'], [3, 'contact_email'], [4, 'contact_phone']]
},
restoreButton:false,
onSuccess:function(data, textStatus, jqXHR)
{
  if(data.action == 'delete')
  {
    $('#'+data.id).remove();
  }
}
});

});
</script>

</body>
<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/content/live-table.blade.php ENDPATH**/ ?>