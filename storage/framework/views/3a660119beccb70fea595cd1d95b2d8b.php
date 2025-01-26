<?php $__env->startSection('title', __('Sales Report')); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1">
            <?php echo app('translator')->get('Sales Report'); ?>
        </div>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back-btn','data' => ['href' => ''.e(route('orders.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('back-btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('orders.index')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#filterModal">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="hero-icon-sm me-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                    </svg>
                    <?php echo app('translator')->get('Filter'); ?>
                </button>
            </div>

            <?php if($sales->isEmpty()): ?>
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
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="sales-table">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Serial Number'); ?></th>
                                <th><?php echo app('translator')->get('Date'); ?></th>
                                <th><?php echo app('translator')->get('Items Sold'); ?></th>
                                <th><?php echo app('translator')->get('Total Services'); ?></th>
                                <th><?php echo app('translator')->get('Total Sales'); ?></th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <?php for($i = 0; $i < $sales->count(); $i++): ?>
                                <tr class="clickable-cell"
                                    onclick="window.location='<?php echo e(route('sales.show', [$sales[$i]->date])); ?>?ts=<?php echo e($sales[$i]->total - $salesOrder[$i]->sum_discount); ?>';">
                                    <td class="align-middle py-3 text-start" lang="en" dir="auto">
                                        <?php echo e(Carbon\Carbon::parse($sales[$i]->date)->format('ymd')); ?>

                                    </td>
                                    <td class="align-middle py-3 text-start" lang="en" dir="auto">
                                        <?php echo e(Carbon\Carbon::parse($sales[$i]->date)->format('d F Y')); ?>

                                    </td>
                                    <td class="align-middle py-3"><?php echo e($sales[$i]->total_sold); ?></td>
                                    <td class="align-middle py-3">
                                        <?php echo e(currency_format($salesServices[$i]->total ?? 0)); ?>

                                    </td>
                                    <td class="align-middle py-3">
                                        <?php echo e(currency_format($sales[$i]->total - $salesOrder[$i]->sum_discount)); ?>

                                    </td>
                                    
                                    <td class=" align-middle">
                                        <?php if($dir == 'ltr'): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                style="width:1.2rem;height:1.2rem;">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                            </svg>
                                        <?php else: ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                style="width:1.2rem;height:1.2rem;">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 19.5L8.25 12l7.5-7.5" />
                                            </svg>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <?php echo e($sales->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="filterModalLabel"><?php echo app('translator')->get('Filter'); ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('sales.filter')); ?>" method="GET" role="form">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="start_date" class="form-label"><?php echo app('translator')->get('From Date'); ?></label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label"><?php echo app('translator')->get('To Date'); ?></label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Use Filter'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/wmktechn/xsmart.wmktech.net/resources/views/sales/filter.blade.php ENDPATH**/ ?>