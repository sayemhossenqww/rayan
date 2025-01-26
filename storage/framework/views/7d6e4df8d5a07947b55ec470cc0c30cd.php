<html lang="en" dir="ltr">

<head>
    <title><?php echo e($order->number); ?> </title>
</head>

<body>


    <div style="margin-bottom: 0.2rem;text-align: center !important;">
        <?php if($settings->logo): ?>
            <div style="padding-right: 1rem;padding-left: 1rem;margin-bottom: 0.5rem;">
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
            <div><?php echo e($detail->product->name); ?></div>
            <div style="display: flex">
                <div> <?php echo e($detail->quantity); ?> (<?php echo e($detail->price_type == 1 ? $detail->product->box_unit : $detail->product->cost_unit); ?>)* <?php echo e($detail->view_price); ?></div>
                <div style="margin-left: auto"><?php echo e($detail->view_total); ?></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($order->discount > 0): ?>
        <div style="display: flex;">
            <div>DISCOUNT</div>
            <div style="margin-left: auto"><?php echo e($order->discount_view); ?></div>
        </div>
    <?php endif; ?>
    <?php if($order->is_delivery): ?>
        <?php if($order->delivery_charge > 0): ?>
            <div style="display: flex;">
                <div><?php echo app('translator')->get('DELIVERY CHARGE'); ?></div>
                <div style="margin-left: auto"><?php echo e($order->delivery_charge_view); ?></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($order->tax_rate > 0): ?>
        <?php if($order->tax_type == 'add'): ?>
            <div style="display: flex;">
                <div>VAT</div>
                <div style="margin-left: auto"><?php echo e($order->tax_rate); ?>%</div>
            </div>
        <?php else: ?>
            <div style="display: flex;">
                <div>SUBTOTAL</div>
                <div style="margin-left: auto"><?php echo e($order->subtotal_view); ?></div>
            </div>
            <div style="display: flex;">
                <div>TAX.AMOUNT</div>
                <div style="margin-left: auto"><?php echo e($order->tax_amount_view); ?></div>
            </div>
            <div style="display: flex;">
                <div>VAT <?php echo e($order->tax_rate); ?>%</div>
                <div style="margin-left: auto"><?php echo e($order->vat_view); ?></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div style="font-weight: 700">
        <div>TOTAL</div>
        <div style="display: flex;">
            <div style="margin-left: auto">
                <?php echo e($order->total_view); ?>

            </div>
        </div>
        <div style="display: flex;">
            <div style="margin-left: auto">
                <?php echo e($order->receipt_exchange_rate); ?>

            </div>
        </div>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;">
        <span style="margin-right: 1rem"><?php echo e($order->date_view); ?></span> <span><?php echo e($order->time_view); ?></span>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;">
        <?php echo e($order->number); ?>

    </div>
    <div style="display: flex;align-items: center !important;justify-content: center;margin-bottom: 0.5rem !important;">
        <?php echo DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false); ?>

    </div>
    <?php if($settings->storeAdditionalInfo): ?>
        <div style="font-size: 0.875em;text-align: center !important;">
            <?php echo nl2br($settings->storeAdditionalInfo); ?>

        </div>
    <?php endif; ?>

</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
<?php /**PATH /Users/mohammadmahbub/Downloads/rayahen_1.2/bin/resources/views/orders/print/en.blade.php ENDPATH**/ ?>