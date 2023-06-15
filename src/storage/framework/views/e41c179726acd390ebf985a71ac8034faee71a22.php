<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="<?php echo e((!empty($containerNav) ? $containerNav : 'container-fluid')); ?> d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      <?php if(session()->has('success')): ?>   
        <div x-data="{show: true}"
             x-init="setTimeout(() => show = false, 5000)"  
             x-show="show">          
          <p><?php echo e(session('success')); ?></p>
          </div>
      <?php endif; ?>
      Roboyo <script>
        document.write(new Date().getFullYear())
      </script>
    </div>
  </div>
</footer>
<!--/ Footer-->
<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\sneat\resources\views/layouts/sections/footer/footer.blade.php ENDPATH**/ ?>