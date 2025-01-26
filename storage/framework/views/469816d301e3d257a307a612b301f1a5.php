
<?php $__env->startSection('title', __('About')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-4">
            <div class="text-center mb-3">
                <div class="fs-1 text-primary fw-bolder">SKY</div>
                <div>Application ID 7BS31237-H222C-B30C-0B481246D1-05FF</div>
                <div>Version 1.0.6</div>
                <div class="small text-muted">
                    v<?php echo e(Illuminate\Foundation\Application::VERSION); ?> (v<?php echo e(PHP_VERSION); ?>)
                </div>
                <div>
                    © <?php echo e(date('Y')); ?> Copyright
                </div>
                <div class="small text-muted">NASA Open Source Agreement v1.3 (NASA-1.3)</div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wmk/retail-shop/resources/views/about/show.blade.php ENDPATH**/ ?>