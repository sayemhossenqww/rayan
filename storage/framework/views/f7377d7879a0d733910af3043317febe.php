<?php $carbon = app('Carbon\Carbon'); ?>
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Cerak, Double Cream & Ricotta Process</title>
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
            <div style="text-align: left;">
                <h2>Dairy Industry – <span class="text-red">Cerak, Double Cream & Ricotta Process</span></h2>
            </div>
            <div style="display: flex; margin-bottom: 1.5rem; width: 100%;">
                <table style="border: 1px solid; width: 100%;">
                    <thead>
                        <tr class="text-center tr-head">
                            <th><?php echo app('translator')->get('Day'); ?></th>
                            <th><?php echo app('translator')->get('Sunday'); ?></th>
                            <th><?php echo app('translator')->get('Monday'); ?></th>
                            <th><?php echo app('translator')->get('Tuesday'); ?></th>
                            <th><?php echo app('translator')->get('Wednesday'); ?></th>
                            <th><?php echo app('translator')->get('Thursday'); ?></th>
                            <th><?php echo app('translator')->get('Friday'); ?></th>
                            <th><?php echo app('translator')->get('Saturday'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo app('translator')->get('Date'); ?></td>
                            <?php for($i = -1; $i < 6; $i++): ?>
                                <td>
                                    <?php echo e($carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y')); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td colspan="8" class="text-center tr-head">From ready-made Areesheh Dairy</td>
                        </tr>
                        <tr>
                            <td>Quantity used</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($dairy_industry['qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Time on fire in minutes</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($dairy_industry['time_fire_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Detail 1</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($dairy_industry['detail_1_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Detail 2</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($dairy_industry['detail_2_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Final Quantity </br>Cerak</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($dairy_industry['cerak_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Final Quantity </br>Double Cream</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($dairy_industry['cream_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Final Quantity </br>Ricotta</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($dairy_industry['ricotta_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <style type="text/css">
            .text-red {
                color: #ff0000;
            }

            .tr-head {
                background-color: red !important; 
                color: white;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }
        </style>
    </body> 
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
<?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/dairy_industry/print.blade.php ENDPATH**/ ?>