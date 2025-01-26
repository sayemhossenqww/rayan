
<?php $__env->startSection('title', $purchase->number); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1"><?php echo app('translator')->get('Purchase'); ?> №<?php echo e($purchase->number); ?></div>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back-btn','data' => ['href' => ''.e(route('purchases.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('back-btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('purchases.index')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    </div>


    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <?php if (\Illuminate\Support\Facades\Blade::check('can_edit')): ?>
                <a href="<?php echo e(route('purchases.edit', $purchase)); ?>" class="btn btn-outline-primary px-4">
                    <?php echo app('translator')->get('Edit'); ?>
                </a>
                <?php endif; ?>
                <a href="<?php echo e(route('purchases.print', $purchase)); ?>" class="btn btn-outline-primary px-4" target="_blank">
                    <?php echo app('translator')->get('Print'); ?>
                </a>
            </div>
            <div class=" table-responsive mb-0">
                <table class="table table-bordered mb-1">
                    <tbody>
                        <tr>
                            <td><?php echo app('translator')->get('Purchase №'); ?></td>
                            <td class="fw-bold"><?php echo e($purchase->number); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('Reference Number'); ?></td>
                            <td class="fw-bold"><?php echo e($purchase->reference_number); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('Date'); ?></td>
                            <td class="fw-bold"><?php echo e($purchase->date_view); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('Supplier'); ?></td>
                            <td class="fw-bold"><?php echo e($purchase->supplier->name ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo app('translator')->get('Notes'); ?></td>
                            <td class="fw-bold"><?php echo e($purchase->notes); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class=" table-responsive mb-0">
                <table class="table table-bordered mb-1">
                    <thead>
                        <tr>
                            <th class=" text-center text-decoration-none fw-bold"><?php echo app('translator')->get('Item'); ?></th>
                            <th class=" text-center text-decoration-none fw-bold"><?php echo app('translator')->get('Quantity'); ?></th>
                            <th class=" text-center text-decoration-none fw-bold"><?php echo app('translator')->get('Unit Cost'); ?></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $purchase->purchase_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($detail->product->name); ?></td>
                                <td class="text-center"><?php echo e($detail->quantity); ?></td>
                                <td class="text-center"><?php echo e(currency_format($detail->cost)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/wmktechn/xsmart.wmktech.net/resources/views/purchases/show.blade.php ENDPATH**/ ?>