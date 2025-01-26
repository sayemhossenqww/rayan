
<?php $__env->startSection('title', __('Create Payments')); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('customers.partials.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="card-title h4">
                <?php echo app('translator')->get('Create Payment'); ?>
            </div>
            <?php echo $__env->make('customers.payments.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wmk/retail-shop/resources/views/customers/payments/create.blade.php ENDPATH**/ ?>