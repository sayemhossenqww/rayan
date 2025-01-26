<!DOCTYPE html>
<html lang="<?php echo e($settings->lang); ?>" dir="<?php echo e($settings->dir); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $__env->yieldContent('title', config('app.name')); ?></title>
    <link rel="preload" href="<?php echo e($cssUrl); ?>" as="style" />
    <link rel="stylesheet" href="<?php echo e($cssUrl); ?>">
    <?php echo $__env->yieldPushContent('style'); ?>
    <?php echo $__env->yieldPushContent('head'); ?>
</head>

<body>
    <div class="container-fluid py-2">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>

</html>
<?php echo $__env->yieldPushContent('script'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
<?php /**PATH /home3/wmktechn/xsmart.wmktech.net/resources/views/layouts/print.blade.php ENDPATH**/ ?>