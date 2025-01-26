<form action="<?php echo e(isset($customer) ? route('customers.update', $customer) : route('customers.store')); ?>" method="POST"
    enctype="multipart/form-data" role="form">
    <?php echo csrf_field(); ?>
    <?php if(isset($customer)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <?php echo $__env->make('customers.partials.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('customers.partials.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('customers.partials.home-address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('customers.partials.company', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('customers.partials.others', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <div class="mb-3">
        <button class="btn btn-primary" type="submit">
            <?php echo app('translator')->get('Save'); ?>
        </button>
    </div>
</form>
<?php /**PATH E:\Projects\Lebanon\Michael\Website\habib0827\Trans food Trading\bin\resources\views/customers/partials/form.blade.php ENDPATH**/ ?>