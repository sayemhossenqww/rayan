<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
</head>

<body style="height:100vh;">

    <div
        style="height: 100%;display: flex;justify-content: center;align-items: center;font-weight: 500;flex-direction: column">
        <div style="line-height: 1.2; font-size: calc(1.3rem + 0.6vw);margin-bottom: 1rem">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <a href="<?php echo e(route('home')); ?>" lang="<?php echo e($settings->lang); ?>"
            style="
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.5rem 1.5rem;
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: 0.3rem;
            text-align: center;
            text-decoration: none">
            <?php echo app('translator')->get('Dashboard'); ?>
        </a>
    </div>
</body>

</html>
<?php /**PATH /home3/wmktechn/xsmart.wmktech.net/resources/views/errors/master.blade.php ENDPATH**/ ?>