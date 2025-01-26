<?php $carbon = app('Carbon\Carbon'); ?>

<?php $__env->startSection('title', __('Shankleesh Process')); ?>

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
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('Shankleesh Process'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="<?php echo e(route('shankleesh.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ])); ?>">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="<?php echo e(route('shankleesh.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ])); ?>">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="<?php echo e(route('shankleesh.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ])); ?>">Next Week</a>
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
                                    <a href="<?php echo e(route('shankleesh.edit', ['shankleesh'=>$shankleesh, 'day'=>$i+2])); ?>">
                                        <?php echo e($carbon::now()->setISODate($year, $week)->addDays($i)->format('d M y')); ?>

                                    </a>
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
    </div>
    <style>
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
            height: 35px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/shankleesh/index.blade.php ENDPATH**/ ?>