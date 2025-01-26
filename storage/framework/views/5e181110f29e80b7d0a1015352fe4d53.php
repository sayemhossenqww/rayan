<html lang="ar" dir="rtl">

<head>
    <title><?php echo e($order->number); ?> </title>
</head>

<body>
    <div style="margin-bottom: 0.2rem;text-align: center !important;">
        <?php if($settings->logo): ?>
            <div style="padding-right: 1rem;padding-left: 1rem;margin-bottom: 0.5rem">
                <?php echo $settings->logo; ?>

            </div>
        <?php else: ?>
            <?php if($settings->storeName): ?>
                <div style="font-size: 1.50rem;"><?php echo e($settings->storeName); ?></div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if($settings->storeAddress): ?>
            <div style="font-size: 1rem;"><?php echo e($settings->storeAddress); ?></div>
        <?php endif; ?>
        <?php if($settings->storePhone): ?>
            <div style="font-size: 0.875em;"><?php echo e($settings->storePhone); ?></div>
        <?php endif; ?>
        <?php if($settings->storeWebsite): ?>
            <div style="font-size: 0.875em;"><?php echo e($settings->storeWebsite); ?></div>
        <?php endif; ?>
        <?php if($settings->storeEmail): ?>
            <div style="font-size: 0.875em;"><?php echo e($settings->storeEmail); ?></div>
        <?php endif; ?>
    </div>
    <div style="margin-bottom: 1.5rem">
        <?php $__currentLoopData = $order->order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="display: flex">
                <div> <?php echo e($detail->product->name); ?> (x<?php echo e($detail->quantity); ?>)</div>
                <div style="margin-right: auto"><?php echo e($detail->view_total); ?></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($order->discount > 0): ?>
        <div style="display: flex;">
            <div>الخصم</div>
            <div style="margin-right: auto"><?php echo e($order->discount_view); ?></div>
        </div>
    <?php endif; ?>
    <?php if($order->is_delivery): ?>
        <?php if($order->delivery_charge > 0): ?>
            <div style="display: flex;">
                <div>رسوم التصويل</div>
                <div style="margin-right: auto"><?php echo e($order->delivery_charge_view); ?></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($order->tax_rate > 0): ?>
        <?php if($order->tax_type == 'add'): ?>
            <div style="display: flex;">
                <div>ضريبة القيمة المضافة</div>
                <div style="margin-right: auto"><?php echo e($order->tax_rate); ?>%</div>
            </div>
        <?php else: ?>
            <div style="display: flex;">
                <div>المجموع</div>
                <div style="margin-right: auto"><?php echo e($order->subtotal_view); ?></div>
            </div>
            <div style="display: flex;">
                <div>قيمة الضريبة</div>
                <div style="margin-right: auto"><?php echo e($order->tax_amount_view); ?></div>
            </div>
            <div style="display: flex;">
                <div>ضريبة القيمة المضافة <?php echo e($order->tax_rate); ?>%</div>
                <div style="margin-right: auto"><?php echo e($order->vat_view); ?></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div style="font-weight: 700">
        <div>الإجمالي</div>
        <div style="display: flex;">
            <div style="margin-right: auto"><?php echo e($order->total_view); ?></div>
        </div>
        <div style="display: flex;">
            <div style="margin-right: auto">
                <?php echo e($order->receipt_exchange_rate); ?>

            </div>
        </div>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;" dir="ltr">
        <span style="margin-right: 1rem"><?php echo e($order->date_view); ?></span> <span><?php echo e($order->time_view); ?></span>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;" dir="ltr">
        <?php echo e($order->number); ?>

    </div>
    <?php if($settings->storeAdditionalInfo): ?>
        <div style="font-size: 0.875em;text-align: center !important;margin-bottom: 0.5rem !important;">
            <?php echo e($settings->storeAdditionalInfo); ?>

        </div>
    <?php endif; ?>
    <div style="display: flex;align-items: center !important;justify-content: center">
        <?php echo DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false); ?>

    </div>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
<?php /**PATH E:\Apple\PHP\WMK\habib\habib\bin\resources\views/orders/print/ar.blade.php ENDPATH**/ ?>