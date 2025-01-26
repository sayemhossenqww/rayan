
<?php $__env->startSection('title', __('Account Statement')); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('customers.partials.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('customers.statements.cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card border-0 rounded-3 shadow-sm w-100">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="card-title h5 flex-grow-1"><?php echo app('translator')->get('Account Statement'); ?></div>
                <div>
                    <?php echo $__env->make('customers.statements.filter-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Date'); ?></th>
                            <th><?php echo app('translator')->get('Ref. №'); ?></th>
                            <th><?php echo app('translator')->get('Description'); ?></th>
                            <th><?php echo app('translator')->get('Debit'); ?></th>
                            <th><?php echo app('translator')->get('Credit'); ?></th>
                            <th><?php echo app('translator')->get('Balance'); ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php $__currentLoopData = $statements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($statement->date); ?> </td>
                                <td><?php echo e($statement->reference_number); ?> </td>
                                <td><?php echo e($statement->description); ?> </td>
                                <td><?php echo e($statement->debit_view); ?> </td>
                                <td><?php echo e($statement->credit_view); ?> </td>
                                <td><?php echo e($statement->balance_view); ?> </td>
                                <td class="align-middle">
                                    <a class="btn btn-outline-primary btn-sm" target="_blank"
                                        href="<?php echo e(route('customers.statements.print', [$customer, $statement])); ?>">
                                        <?php echo app('translator')->get('Print'); ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($statements->isEmpty()): ?>
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
                <?php echo e($statements->links()); ?>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wmk/retail-shop/resources/views/customers/statements/index.blade.php ENDPATH**/ ?>