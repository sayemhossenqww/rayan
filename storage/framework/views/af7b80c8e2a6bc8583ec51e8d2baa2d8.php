<?php $__env->startSection('title', __('Sales Man')); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-3 h4">
        <?php echo app('translator')->get('Sales Man'); ?>
    </div>

    <?php echo $__env->make('salesman.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Projects\Lebanon\Michael\habib0827\Trans food Trading\bin\resources\views/salesman/index.blade.php ENDPATH**/ ?>