<?php $carbon = app('Carbon\Carbon'); ?>
<html lang="en" dir="ltr">
    <head>
        <title><?php echo e($staff->name); ?> </title>
    </head>

    <body>
        <div style="margin-bottom: 0.2rem;text-align: center !important;">
            <div style="text-align: left;">
                <h2>Name: <?php echo e($staff->name); ?></h2>
            </div>
            <div style="display: flex; margin-bottom: 1.5rem; width: 100%;">
                <table style="border: 1px solid; width: 100%;">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Day'); ?></th>
                            <th><?php echo app('translator')->get('Date'); ?></th>
                            <th><?php echo app('translator')->get('In'); ?></th>
                            <th><?php echo app('translator')->get('Out'); ?></th>
                            <th><?php echo app('translator')->get('Signature'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 1; $i <= $carbon::createFromDate($year, $month, 1)->endOfMonth()->format('d'); $i++): ?>
                            <tr 
                                class=<?php echo e($carbon::createFromDate($year, $month, $i)->dayName == 'Sunday' ? 'text-red' : ''); ?>

                            >
                                <td>
                                    <?php echo e($carbon::createFromDate($year, $month, $i)->dayName); ?>

                                </td>
                                <td><?php echo e($i); ?> <?php echo e($carbon::createFromDate($year, $month, $i)->format('M')); ?> <?php echo e($carbon::createFromDate($year, $month, $i)->format('y')); ?></td>
                                <td><?php echo e($attendance['in_'.$i]); ?></td>
                                <td><?php echo e($attendance['out_'.$i]); ?></td>
                                <td></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <style type="text/css">
            .text-red {
                color: #ff0000;
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
<?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/staffs/print.blade.php ENDPATH**/ ?>