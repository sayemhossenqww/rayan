<?php $carbon = app('Carbon\Carbon'); ?>

<?php $__env->startSection('title', __('Milk Details')); ?>

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
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('Milk Details'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>
        <div class="h4 mb-0 flex-grow-2">
            <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="<?php echo e(route('milk_details.print', ['year'=>$carbon::now()->setISODate($year, $week)->format('y'), 'week'=>$week ])); ?>">Print</a>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="<?php echo e(route('milk_details.index', ['year'=>$carbon::now()->setISODate($year, $week-1)->format('y'), 'week'=>$week-1 ])); ?>">Prev Week</a>
        <a class="h4 mb-0 flex-grow-2" href="<?php echo e(route('milk_details.index', ['year'=>$carbon::now()->setISODate($year, $week+1)->format('y'), 'week'=>$week+1 ])); ?>">Next Week</a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table table-hover table-striped table-hover-x">
                    <thead>
                        <tr>
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
                        <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    <?php echo e($staff->name); ?><br/>
                                    Milk 1st Qty 
                                </td>
                                <?php for($i = -1; $i < 6; $i++): ?>
                                    <td>
                                        <?php echo e($milk_details[$staff->id]['1_qty_'.$i+2]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    Temperature
                                </td>
                                <?php for($i = -1; $i < 6; $i++): ?>
                                    <td>
                                        <?php echo e($milk_details[$staff->id]['1_temperature_'.$i+2]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    Water %
                                </td>
                                <?php for($i = -1; $i < 6; $i++): ?>
                                    <td>
                                        <?php echo e($milk_details[$staff->id]['1_water_'.$i+2]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr>
                                <td colspan="8"></td>
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    <?php echo e($staff->name); ?><br/>
                                    Milk 2nd Qty 
                                </td>
                                <?php for($i = -1; $i < 6; $i++): ?>
                                    <td>
                                        <?php echo e($milk_details[$staff->id]['2_qty_'.$i+2]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    Temperature
                                </td>
                                <?php for($i = -1; $i < 6; $i++): ?>
                                    <td>
                                        <?php echo e($milk_details[$staff->id]['2_temperature_'.$i+2]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    Water %
                                </td>
                                <?php for($i = -1; $i < 6; $i++): ?>
                                    <td>
                                        <?php echo e($milk_details[$staff->id]['2_water_'.$i+2]); ?>

                                    </td>
                                <?php endfor; ?>
                            </tr>
                            <tr>
                                <td colspan="8" style="background-color: brown;"></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($staffs->isEmpty()): ?>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.no-data','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="">
                <?php echo e($staffs->withQueryString()->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/htdocs/wmk/pos/resources/views/milk_details/index.blade.php ENDPATH**/ ?>