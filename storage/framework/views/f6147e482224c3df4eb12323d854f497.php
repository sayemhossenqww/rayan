
<?php $__env->startSection('title', $payment->number); ?>

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
    <div class="mb-3 text-uppercase text-center fw-bold h3">PAYMENT RECEIPT</div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Receipt №</td>
                <td><?php echo e($payment->number); ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php echo e($payment->date_view); ?></td>
            </tr>
            <tr>
                <td>Received from</td>
                <td>
                    <div><?php echo e($supplier->name); ?></div>
                    <div><?php echo e($supplier->email); ?></div>
                </td>
            </tr>
            <?php if($payment->comments): ?>
                <tr>
                    <td>Comments</td>
                    <td><?php echo e($payment->comments); ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <td>Payment Mode</td>
                <td><?php echo e($payment->mode ?? '-'); ?></td>
            </tr>
            <tr class="fw-bold">
                <td>Amount</td>
                <td><?php echo e($payment->amount_view); ?></td>
            </tr>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.print', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Max\Desktop\retail-shop\resources\views/suppliers/payments/print.blade.php ENDPATH**/ ?>