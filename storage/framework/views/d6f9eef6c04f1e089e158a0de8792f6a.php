<?php $carbon = app('Carbon\Carbon'); ?>
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Shankleesh Process</title>
        <style>
            .text-red {
                color: rgb(123, 244, 43);
            }

            .tr-head {
                background-color: rgb(123, 244, 43) !important; 
                color: white;
            }

            .tr-color {
                background-color: rgba(58, 244, 61, 0.76) !important; 
                text-align: center;
                color: white;
            }
            .tr-height {
                height: 20px;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div style="margin-bottom: 0.2rem;text-align: center !important;" class="content">
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
                <h2>Dairy Industry – <span class="text-red">Shankleesh Process</span></h2>
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
                    <tbody class="border-top-0">
                        <tr>
                            <td><?php echo app('translator')->get('Date'); ?></td>
                            <?php for($i = -1; $i < 6; $i++): ?>
                                <td>
                                    <?php echo e($carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y')); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-color">
                            <td colspan="8"><?php echo app('translator')->get('From Laban'); ?></td>
                        </tr>
                        <tr>     
                            <td><?php echo app('translator')->get('Quantity used'); ?></td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($shankleesh['qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>     
                            <td><?php echo app('translator')->get('Quantity of salt added'); ?></td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($shankleesh['salt_added_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-color tr-height">
                            <td colspan="8"></td>
                        </tr>
                        <tr>     
                            <td><?php echo app('translator')->get('Salt'); ?></td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($shankleesh['salt_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>     
                            <td><?php echo app('translator')->get('Milk per Kg'); ?></td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($shankleesh['milk_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-height">     
                            <?php for($i = 1; $i <= 8; $i++): ?>
                                <td></td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-color tr-height">
                            <td colspan="8"></td>
                        </tr>
                        <tr class="tr-height">     
                            <?php for($i = 1; $i <= 8; $i++): ?>
                                <td></td>
                            <?php endfor; ?>
                        </tr>
                        <tr>     
                            <td><?php echo app('translator')->get('Final Quantity in kg'); ?></td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($shankleesh['final_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body> 
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
<?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/shankleesh/print.blade.php ENDPATH**/ ?>