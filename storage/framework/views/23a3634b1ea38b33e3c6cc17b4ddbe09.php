
<?php $__env->startSection('title', $customer->name); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('customers.partials.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(!$orders->isEmpty()): ?>
    <?php if (\Illuminate\Support\Facades\Blade::check('can_edit')): ?>
        <div class="card w-100 mb-3">
            <div class="card-body">
                <div class=" table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td><?php echo app('translator')->get('Invoices'); ?>:</td>
                            <td><?php echo e($totalOrders); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('Cost'); ?>:</td>
                            <td><?php echo e($totalCost); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('Sales'); ?>:</td>
                            <td><?php echo e($totalSold); ?></td>
                        </tr>
                        <tr class=" alert-success">
                            <td><?php echo app('translator')->get('Profit'); ?>:</td>
                            <td><?php echo e($totalProfit); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6">
                <?php echo $__env->make('orders.analytics.total-sales', ['cardTitle' => __('Sales')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
                <?php echo $__env->make('orders.analytics.total-orders', ['cardTitle' => __('Invoices')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="card w-100">
        <div class="card-body">
            <?php if($orders->isEmpty()): ?>
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
            <?php else: ?>
                <?php echo $__env->make('orders.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div>
                <?php echo e($orders->withQueryString()->links()); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wmk/retail-shop/resources/views/customers/orders.blade.php ENDPATH**/ ?>