<html lang="ar" dir="rtl">

<head>
    <title><?php echo app('translator')->get('Inventory Report'); ?></title>
</head>

<body>
    <div style="font-size: 1.50rem;font-weight: 700;margin-bottom: 1rem"><?php echo e($storeName); ?></div>
    <div style="font-weight: 700;margin-bottom: 1.5rem"><?php echo app('translator')->get('Inventory Report'); ?></div>
    <div><?php echo e($inventoryHistory->start_date); ?> -</div>
    <div><?php echo e($inventoryHistory->end_date); ?></div>

    <hr style="font-weight: 700;margin-bottom: 1.5rem">

    <div style="display: flex;margin-bottom: 1.5rem">
        <div><?php echo app('translator')->get('Invoices'); ?></div>
        <div style="margin-right: auto"><?php echo e(currency_format($inventoryHistory->invoices)); ?></div>
    </div>
    <div style="display: flex;margin-bottom: 1.5rem">
        <div><?php echo app('translator')->get('Customers'); ?></div>
        <div style="margin-right: auto"><?php echo e(currency_format($inventoryHistory->customers)); ?></div>
    </div>
    <div style="display: flex;margin-bottom: 1.5rem">
        <div><?php echo app('translator')->get('Cash Sales'); ?></div>
        <div style="margin-right: auto"><?php echo e(currency_format($inventoryHistory->cash_sales)); ?></div>
    </div>
    <hr style="font-weight: 700;margin-bottom: 1.5rem">
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
<?php /**PATH D:\Work\XSmart\SKY\bin\resources\views/inventory/print-ar.blade.php ENDPATH**/ ?>