<html lang="en" dir="ltr">

<head>
    <title><?php echo app('translator')->get('Drawer Report'); ?></title>
</head>

<body>
    <div style="font-size: 1.50rem;font-weight: 700;margin-bottom: 1rem"><?php echo e($storeName); ?></div>

    <div style="font-weight: 700;margin-bottom: 1.5rem"><?php echo app('translator')->get('Drawer Report'); ?></div>
    <div><?php echo e($drawerHistory->start_date); ?> -</div>
    <div><?php echo e($drawerHistory->end_date); ?></div>

    <hr style="font-weight: 700;margin-bottom: 1.5rem">

    <div style="display: flex;margin-bottom: 1.5rem">
        <div><?php echo app('translator')->get('Starting Cash'); ?></div>
        <div style="margin-left: auto"><?php echo e(currency_format($drawerHistory->starting_cash)); ?></div>
    </div>
    <div style="display: flex;margin-bottom: 1.5rem">
        <div><?php echo app('translator')->get('Cash Sales'); ?></div>
        <div style="margin-left: auto"><?php echo e(currency_format($drawerHistory->cash_sales)); ?></div>
    </div>
    <div style="display: flex;margin-bottom: 1.5rem">
        <div><?php echo app('translator')->get('Payouts'); ?></div>
        <div style="margin-left: auto"><?php echo e(currency_format($drawerHistory->paid_out)); ?></div>
    </div>
    <div style="display: flex;margin-bottom: 1.5rem;font-weight: 700">
        <div><?php echo app('translator')->get('Expected in drawer'); ?></div>
        <div style="margin-left: auto"><?php echo e(currency_format($drawerHistory->expected)); ?></div>
    </div>
    <div style="display: flex;margin-bottom: 1.5rem">
        <div><?php echo app('translator')->get('Actual in drawer'); ?></div>
        <div style="margin-left: auto"><?php echo e(currency_format($drawerHistory->actual)); ?></div>
    </div>
    <div style="display: flex;margin-bottom: 1.5rem">
        <div><?php echo app('translator')->get('Difference'); ?></div>
        <div style="margin-left: auto"><?php echo e($drawerHistory->difference_view); ?></div>
    </div>
    <hr style="font-weight: 700;margin-bottom: 1.5rem">
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
<?php /**PATH D:\Work\XSmart\XSmarl-F1\bin\resources\views/drawer/print.blade.php ENDPATH**/ ?>