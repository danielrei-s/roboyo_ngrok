<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
    <div
        class="<?php echo e(!empty($containerNav) ? $containerNav : 'container-fluid'); ?> d-flex flex-wrap justify-content-between py-2 flex-row-reverse">
        <div class="mb-2 mb-md-0 ">
            <?php if(session()->has('success')): ?>
                
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"> 

                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div class="bs-toast toast fade show bg-primary" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-header">
                                <i class="bx bx-bell me-2"></i>
                                <div class="me-auto fw-semibold">Success!</div>
                                <small><?php echo e(date('h:i A')); ?></small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <?php echo e(session('success')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(session()->has('failed')): ?>
                <!-- Failed message section -->
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show">
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div class="bs-toast toast fade show bg-danger" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-header">
                                <i class="bx bx-bell me-2"></i>
                                <div class="me-auto fw-semibold">Failed!</div>
                                <small><?php echo e(date('h:i A')); ?></small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <?php echo e(session('failed')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(session()->has('warning')): ?>
                <!-- Warning message section -->
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 7500)" x-show="show">
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div class="bs-toast toast fade show bg-warning" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-header">
                                <i class="bx bx-bell me-2"></i>
                                <div class="me-auto fw-semibold">Waning!</div>
                                <small><?php echo e(date('h:i A')); ?></small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <?php echo e(session('warning')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
</footer>
<!--/ Footer-->
<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/layouts/sections/footer/footer.blade.php ENDPATH**/ ?>