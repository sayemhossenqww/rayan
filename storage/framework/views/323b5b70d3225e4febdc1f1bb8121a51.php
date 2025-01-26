<?php $carbon = app('Carbon\Carbon'); ?>
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Raclette</title>
        <style>
            @media print {
                body {
                    width: 100%;
                    margin: 0;
                    position: relative;
                    height: auto;
                    /* Needed to ensure long documents repeat backgrounds effectively */
                }
                /* Apply styles to the pseudo-element */
                body::before {
                    content: "";
                    position: fixed;
                    top: 0;
                    left: 15%;
                    width: 100vw;
                    height: 100vh;
                    background-image: url('/images/meet_logo.png');
                    background-size: contain;
                    background-repeat: repeat-y;
                    opacity: 0.1; /* or adjust to your desired transparency level */
                    z-index: -1; /* Make sure it is behind the content */
                    pointer-events: none;
                }
                /* Ensure the table breaks over pages correctly */
                .content {
                    position: relative;
                    z-index: 1;
                    page-break-inside: avoid; /* Prevent page breaks inside content */
                }
            }
            .text-red {
                color: rgb(238, 113, 63);
            }

            .tr-head {
                background-color: rgb(238, 113, 63) !important; 
                color: white;
            }

            .tr-color {
                background-color: rgba(244, 126, 87, 0.51) !important; 
                text-align: center;
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
            <div style="text-align: left;">
                <h2>Dairy Industry – <span class="text-red">Raclette</span></h2>
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
                        <?php $__currentLoopData = $fields1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <?php if($value == 'Temperature'): ?>
                                <tr class="tr-color">
                            <?php else: ?>
                                <tr>
                            <?php endif; ?>      
                                <td><?php echo e($value); ?></td>
                                <?php for($i = 1; $i <= 7; $i++): ?>
                                    <td>
                                        <?php echo e($raclette[$key.'_'.$i]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $fields2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
                            <?php if($key == 'final_qty'): ?>
                                <tr class="tr-color">
                            <?php else: ?>
                                <tr>
                            <?php endif; ?>  
                                <td><?php echo e($value); ?></td>
                                <?php for($i = 1; $i <= 7; $i++): ?>
                                    <td>
                                        <?php echo e($key == 'date' ? $raclette->dateView($raclette->raclette2[$key.'_'.$i]) : $raclette->raclette2[$key.'_'.$i]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <?php if($key == 'notes'): ?>
                                <tr class="tr-color">
                                    <td colspan="8"></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/raclette/print.blade.php ENDPATH**/ ?>