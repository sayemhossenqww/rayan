<?php $carbon = app('Carbon\Carbon'); ?>

<?php $__env->startSection('title', __('Edit') . ' ' . __('Staff')); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1"><?php echo app('translator')->get('Staff'); ?> <?php echo app('translator')->get('Attendance'); ?> </div>
        <a class="h4 mb-0 flex-grow-1 btn btn-primary" href="<?php echo e(route('staffs.attendance.print', ['staff'=>$staff, 'year'=>$carbon::createFromDate($year, $month, 1)->format('y'), 'month'=>$carbon::createFromDate($year, $month, 1)->format('m') ])); ?>">Print</a>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back-btn','data' => ['href' => ''.e(route('staffs.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('back-btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('staffs.index')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <a class="h4 mb-0 flex-grow-1" href="<?php echo e(route('staffs.attendance', ['staff'=>$staff, 'year'=>$carbon::createFromDate($year, $month-1, 1)->format('y'), 'month'=>$carbon::createFromDate($year, $month-1, 1)->format('m') ])); ?>">Prev Month</a>
        <a class="h4 mb-0 flex-grow-2" href="<?php echo e(route('staffs.attendance', ['staff'=>$staff, 'year'=>$carbon::createFromDate($year, $month+1, 1)->format('y'), 'month'=>$carbon::createFromDate($year, $month+1, 1)->format('m') ])); ?>">Next Month</a>
    </div>
    <div class="card w-100">
        <div class="card-header">
            <h2>Name: <?php echo e($staff->name); ?></h2>
        </div>
        <div class="card-body">
            <table class="table table-hover table-hover-x">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->get('Day'); ?></th>
                        <th><?php echo app('translator')->get('Date'); ?></th>
                        <th><?php echo app('translator')->get('In'); ?></th>
                        <th><?php echo app('translator')->get('Out'); ?></th>
                        <th><?php echo app('translator')->get('Signature'); ?></th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    <?php for($i = 1; $i <= $carbon::createFromDate($year, $month, 1)->endOfMonth()->format('d'); $i++): ?>
                        <tr 
                            class=<?php echo e($carbon::createFromDate($year, $month, $i)->dayName == 'Sunday' ? 'text-red' : ''); ?>

                        >
                            <td>
                                <a href="<?php echo e(route('staffs.do.attendance', $attendance)); ?>/<?php echo e($i); ?>">
                                    <?php echo e($carbon::createFromDate($year, $month, $i)->dayName); ?>

                                </a>
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
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/staffs/attendance.blade.php ENDPATH**/ ?>