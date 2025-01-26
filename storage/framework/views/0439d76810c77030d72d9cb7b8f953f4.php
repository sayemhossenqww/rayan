<?php $carbon = app('Carbon\Carbon'); ?>

<?php $__env->startSection('title', __('Cheese Process')); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('Diary Industry'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="<?php echo e(route('cheese_process.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ])); ?>">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="<?php echo e(route('cheese_process.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ])); ?>">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="<?php echo e(route('cheese_process.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ])); ?>">Next Week</a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table table-hover">
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
                                    <a href="<?php echo e(route('cheese_process.edit', ['cheese'=>$cheese, 'day'=>$i+2])); ?>">
                                        <?php echo e($carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y')); ?>

                                    </a>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Quantity used</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Milk Analyzer Test</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['milk_analyzer_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>On fire @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['time_on_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Off of fire @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['time_off_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Cooled down @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['cooled_down_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Rennet quantity</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['rennet_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Added @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['added_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Fermented @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['fermented_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Cut @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['cut_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Quantity of </br>Balady cheese</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese['balady_cheese_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                    </tbody>

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
                        <tr class="tr-color">
                            <td>Put in Mold @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese->cheese2['put_in_mold_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-color">
                            <td>Boiling started @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese->cheese2['boiling_started_1_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-color">
                            <td>Boiling started @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese->cheese2['boiling_started_2_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-color">
                            <td>Quantity of Halloum cheese</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese->cheese2['halloum_cheese_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr class="tr-color">
                            <td>In fridge @</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese->cheese2['in_fridge_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td>Quantity of </br>Akkwai cheese</td>
                            <?php for($i = 1; $i <= 7; $i++): ?>
                                <td>
                                    <?php echo e($cheese->cheese2['akkwai_cheese_qty_'.$i]); ?>

                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <tr class="text-center tr-head">
                                <th><?php echo app('translator')->get('Total'); ?></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .tr-head {
            background-color: rgb(33, 236, 80) !important; 
            color: white;
        }

        .tr-color {
            background-color: rgb(246, 213, 141) !important; 
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/cheese_process/index.blade.php ENDPATH**/ ?>