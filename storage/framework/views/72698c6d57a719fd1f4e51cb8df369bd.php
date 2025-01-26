<?php $carbon = app('Carbon\Carbon'); ?>
<html lang="en" dir="ltr">
    <head>
        <title>Dairy Industry – Kishek</title>
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
                color: rgb(246, 27, 27);
            }

            .tr-head {
                background-color: rgb(242, 34, 20) !important; 
                color: white;
            }

            .tr-color {
                background-color: rgb(246, 27, 27) !important; 
                height: 10px;
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
                <h2>Dairy Industry – <span class="text-red">Kishek</span></h2>
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
                            <td>Qty of laban in kg</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($kishek['kishek_'.$i]['laban_qty']); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Groats</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($kishek['kishek_'.$i]['groats']); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Salt </td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($kishek['kishek_'.$i]['salt']); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Current weight</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($kishek['kishek_'.$i]['current_weight']); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-color">
                            <td colspan="8"></td>
                        </tr>
                        <tr>
                            <td>Breaking date </td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($kishek['kishek_'.$i]['date_view']); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Cost of breaking </td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($kishek['kishek_'.$i]['cost_of_breaking']); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-color">
                            <td colspan="8"></td>
                        </tr>
                        <?php for($j = 1; $j <= 9; $j++): ?>
                            <tr>
                                <td><?php echo e($j); ?> - Labneh Added - Date</td>
                                <?php for($i = 1; $i <= 7; $i++): ?>
                                    <td>
                                        <?php echo e($kishek->dateView($kishek['kishek_'.$i]['labneh_added_'.$j])); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr>
                                <td>Amount of Labneh Added</td>
                                <?php for($i = 1; $i <= 7; $i++): ?>
                                    <td>
                                        <?php echo e($kishek['kishek_'.$i]['labneh_amount_'.$j]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr>
                                <td>Current weight</td>
                                <?php for($i = 1; $i <= 7; $i++): ?>
                                    <td>
                                        <?php echo e($kishek['kishek_'.$i]['current_weight_'.$j]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr class="tr-color">
                                <td colspan="8"></td>
                            </tr>
                        <?php endfor; ?>
                        <tr>
                            <td>Final Quantity</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($kishek['kishek_'.$i]['final_qty']); ?>

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
<?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/kishek/print.blade.php ENDPATH**/ ?>