
<?php $__env->startSection('title', __('Payments')); ?>

<?php $__env->startSection('content'); ?>
    <div class="card border-0 rounded-3 shadow-sm w-100">
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <div class="flex-grow-1">
                    <div class="card-title h5 mb-0"><?php echo app('translator')->get('Payments'); ?></div>
                </div>
                <div>
                    <a href="<?php echo e(route('payments.filter.print')); ?>?start_date=<?php echo e($startDate); ?>&end_date=<?php echo e($endDate); ?>"
                        class="btn btn-primary px-4" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero-icon-sm me-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                        </svg>
                        <?php echo app('translator')->get('Print'); ?>
                    </a>
                    <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                        data-bs-target="#filterModal">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero-icon-sm me-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                        </svg>
                        <?php echo app('translator')->get('Filter'); ?>
                    </button>
                    <div class="modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="filterModalLabel"><?php echo app('translator')->get('Paymetns Filter'); ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="<?php echo e(route('payments.filter')); ?>" method="GET" role="form">
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
                </div>

            </div>
            <table class="table table-bordered">
                <tr>
                    <td><?php echo app('translator')->get('From Date'); ?></td>
                    <td class="fw-bold"><?php echo e($fromDate); ?></td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('To Date'); ?></td>
                    <td class="fw-bold"><?php echo e($toDate); ?></td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('Total'); ?></td>
                    <td class="fw-bold"><?php echo e($payments_sum); ?></td>
                </tr>
            </table>
            <div class=" table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Date'); ?></th>
                            <th><?php echo app('translator')->get('Number'); ?></th>
                            <th><?php echo app('translator')->get('Customer'); ?></th>
                            <th><?php echo app('translator')->get('Amount'); ?></th>
                            <th><?php echo app('translator')->get('Payment Mode'); ?></th>
                            <th><?php echo app('translator')->get('Comments'); ?></th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($payment->date_view); ?> </td>
                                <td class="fw-bold"><?php echo e($payment->number); ?> </td>
                                <td>
                                    <a href="<?php echo e(route('customers.show', $payment->customer)); ?>"
                                        class=" text-decoration-none  fw-bold">
                                        <?php echo e($payment->customer->name); ?>

                                    </a>
                                </td>
                                <td><?php echo e($payment->amount_view); ?> </td>
                                <td><?php echo e($payment->mode ?? '-'); ?> </td>
                                <td><?php echo e($payment->comments); ?> </td>

                                

                                <td class="align-middle">
                                    <div class="dropdown d-flex">
                                        <button class="btn btn-link me-auto text-black p-0" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-ellipsis-horizontal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hero-icon']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end animate slideIn shadow-sm"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" target="_blank"
                                                    href="<?php echo e(route('customers.payments.print', [$payment->customer, $payment])); ?>">
                                                    <?php echo app('translator')->get('Print'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="<?php echo e(route('customers.payments.edit', [$payment->customer, $payment])); ?>">
                                                    <?php echo app('translator')->get('Edit'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <form
                                                        action="<?php echo e(route('customers.payments.destroy', [$payment->customer, $payment])); ?>"
                                                        method="POST" id="form-<?php echo e($payment->id); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="button"
                                                            class="btn btn-link p-0 m-0 w-100 text-start text-decoration-none text-danger"
                                                            onclick="submitDeleteForm('<?php echo e($payment->id); ?>')">
                                                            <?php echo app('translator')->get('Delete'); ?>
                                                        </button>
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($payments->isEmpty()): ?>
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
            <div>
                <?php echo e($payments->withQueryString()->links()); ?>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Max\Desktop\retail-shop\resources\views/payments/filter.blade.php ENDPATH**/ ?>