<?php $carbon = app('Carbon\Carbon'); ?>

<?php $__env->startSection('title', __('Staffs')); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">
            <?php echo e($day); ?> <?php echo e($carbon::createFromDate($year, $month, $day)->format('M')); ?> <?php echo e($carbon::createFromDate($year, $month, $day)->format('y')); ?> <?php echo app('translator')->get('Attendance'); ?></div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="<?php echo e(route('attendances.index', ['day'=>$day-1, 'year'=>$carbon::createFromDate($year, $month, $day-1)->format('y'), 'month'=>$carbon::createFromDate($year, $month, $day-1)->format('m') ])); ?>">Prev Day</a>
        <a class="h4 mb-0 flex-grow-2" href="<?php echo e(route('attendances.index', ['day'=>$day+1, 'year'=>$carbon::createFromDate($year, $month, $day+1)->format('y'), 'month'=>$carbon::createFromDate($year, $month, $day+1)->format('m') ])); ?>">Next Day</a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table table-hover table-striped table-hover-x">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Name'); ?></th>
                            <th><?php echo app('translator')->get('In'); ?></th>
                            <th><?php echo app('translator')->get('Out'); ?></th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="align-middle fw-bold py-3">
                                    <a href="<?php echo e(route('attendances.show', ['attendance'=>$attendances[$staff->id], 'day'=>$day])); ?>">
                                        <?php echo e($staff->name); ?> 
                                    </a>
                                </td>
                                <td class="align-middle fw-bold"><?php echo e($attendances[$staff->id]['in_'.$day]); ?></td>
                                <td class="align-middle fw-bold"><?php echo e($attendances[$staff->id]['out_'.$day]); ?></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/htdocs/wmk/pos/resources/views/attendances/index.blade.php ENDPATH**/ ?>