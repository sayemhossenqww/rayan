<?php $carbon = app('Carbon\Carbon'); ?>
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Cheese Process</title>
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
                color: rgb(236, 134, 33);
            }

            .tr-head {
                background-color: rgb(236, 134, 33) !important; 
                color: white;
            }

            .tr-color {
                background-color: rgb(246, 213, 141) !important; 
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
                <h2>Dairy Industry – <span class="text-red">Cheese Process</span></h2>
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
                        <tr>
                            <td>Quantity of Milk</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>On Fire @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['time_on_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Off of Fire @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['time_off_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Cooled down @ </td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['cooled_down_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Ferment Added @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['ferment_added_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Quantity of Ferment added</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['ferment_added_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Pressured @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['pressured_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Temperature</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['temperature_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>On fire & Cut @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['fire_cut_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Water Temperature</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['water_temperature_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Serum removed</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular['serum_removed_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Put in water</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular->regular2['put_in_water_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>In mold @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular->regular2['in_mold_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular->regular2['date_view'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Water</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular->regular2['water_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Salt</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular->regular2['salt_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Quantity of l’ancienne</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular->regular2['lancienne_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Quantity of regular</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($regular->regular2['reqular_qty_'.$i]); ?>

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
<?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/gouda_regular/print.blade.php ENDPATH**/ ?>