
<?php $__env->startSection('title', $statement->id); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center mb-5">
           <div class="flex-grow-1 h1 fw-bold mb-0">
            <?php echo e($settings->storeName); ?>

        </div>

        <div>
            <?php if($settings->storeAddress): ?>
                <div> <?php echo e($settings->storeAddress); ?></div>
            <?php endif; ?>
            <?php if($settings->storePhone): ?>
                <div> <?php echo e($settings->storePhone); ?></div>
            <?php endif; ?>
            <?php if($settings->storeWebsite): ?>
                <div> <?php echo e($settings->storeWebsite); ?></div>
            <?php endif; ?>
            <?php if($settings->storeEmail): ?>
                <div> <?php echo e($settings->storeEmail); ?></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="mb-3 text-uppercase text-center fw-bold h3">Account Statement</div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Ref. №</td>
                <td><?php echo e($statement->reference_number); ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php echo e($statement->date); ?></td>
            </tr>
            <tr>
                <td>To</td>
                <td>
                    <div><?php echo e($customer->name); ?></div>
                    <?php if($customer->mobile): ?>
                        <div class="text-muted small"> <?php echo e($customer->mobile); ?></div>
                    <?php endif; ?>
                    <?php if($customer->telephone): ?>
                        <div class="text-muted small"> <?php echo e($customer->telephone); ?></div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Credit</td>
                <td><?php echo e($statement->credit_view); ?></td>
            </tr>
            <tr>
                <td>Debit</td>
                <td><?php echo e($statement->debit_view); ?></td>
            </tr>
            <tr>
                <td>Balance</td>
                <td><?php echo e($statement->balance_view); ?></td>
            </tr>
            <?php if($statement->description): ?>
                <tr>
                    <td>Description</td>
                    <td><?php echo e($statement->description); ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/wmktechn/xsmart.wmktech.net/resources/views/customers/statements/print.blade.php ENDPATH**/ ?>