<?php $__env->startSection('title', 'Sales'); ?>

<?php $__env->startSection('content'); ?>


    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="mb-0 flex-grow-1">
            <div class="mb-0 h4"> <span class="fw-bold" dir="ltr">№<?php echo e($serial_number); ?></span></div>
        </div>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.back-btn','data' => ['href' => ''.e(route('sales.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('back-btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('sales.index')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    </div>
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <button class="btn btn-primary mb-3 px-4" onclick="printDiv('printableArea')">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-printer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hero-icon-sm me-1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?> <?php echo app('translator')->get('Print'); ?>
        </button>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><?php echo app('translator')->get('Report'); ?> №</td>
                    <td><?php echo e($serial_number); ?></td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('Date'); ?></td>
                    <td><?php echo e($date); ?></td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('Expenses'); ?></td>
                    <td><?php echo e(currency_format($expenses)); ?></td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('Payments'); ?></td>
                    <td><?php echo e(currency_format($payments)); ?></td>
                </tr>
                <tr>
                    <td><?php echo app('translator')->get('Total Sales'); ?></td>
                    <td><?php echo e(currency_format($total_sales)); ?></td>
                </tr>
            </tbody>
        </table>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class=" fw-bold text-decoration-none"><?php echo app('translator')->get('Item'); ?></th>
                    <th class="text-center fw-bold text-decoration-none"><?php echo app('translator')->get('Quantity Sold'); ?></th>
                    <th class="text-center fw-bold text-decoration-none"><?php echo app('translator')->get('Total'); ?></th>
                </tr>
            </thead>
            <tbody class="border-top-0">
                <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <?php echo e($sale->product->name); ?>

                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <?php echo e($sale->qty); ?>

                        </td>
                        <td class="align-middle text-center">
                            <?php echo e(currency_format($sale->total)); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>



     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

    <div id="printableArea" class="d-none">
        <div style="padding: 0.5rem !important;" dir="ltr" lang="<?php echo e($settings->lang); ?>">
            <div class="d-flex align-items-center mb-5">
                <div class="flex-grow-1">
                   <div class="flex-grow-1 h1 fw-bold mb-0">
            <?php echo e($settings->storeName); ?>

        </div>
                </div>
                <div>
                    <?php if($settings->storeAddress): ?>
                        <div> <?php echo e($settings->storeAddress); ?></div>
                    <?php endif; ?>
                    <?php if($settings->storePhone): ?>
                        <div> <?php echo e($settings->storePhone); ?></div>
                    <?php endif; ?>
                    <?php if($settings->storeWebsite): ?>
                        <div> <?php echo e($settings->storeWebsite); ?></div>
                    <?php endif; ?>
                    <?php if($settings->storeEmail): ?>
                        <div> <?php echo e($settings->storeEmail); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mb-3 text-uppercase text-center fw-bold h4">Sale Report</div>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><?php echo app('translator')->get('Report'); ?> №</td>
                        <td><?php echo e($serial_number); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get('Date'); ?></td>
                        <td><?php echo e($date); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get('Expenses'); ?></td>
                        <td><?php echo e(currency_format($expenses)); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get('Payments'); ?></td>
                        <td><?php echo e(currency_format($payments)); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get('Total Sales'); ?></td>
                        <td><?php echo e(currency_format($total_sales)); ?></td>
                    </tr>
                </tbody>
            </table>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class=" fw-bold text-decoration-none"><?php echo app('translator')->get('Item'); ?></th>
                        <th class="text-center fw-bold text-decoration-none"><?php echo app('translator')->get('Quantity Sold'); ?></th>
                        <th class="text-center fw-bold text-decoration-none"><?php echo app('translator')->get('Total'); ?></th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <?php echo e($sale->product_name); ?>

                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <?php echo e($sale->qty); ?>

                            </td>
                            <td class="align-middle text-center">
                                <?php echo e(currency_format($sale->total)); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/wmktechn/xsmart.wmktech.net/resources/views/sales/show.blade.php ENDPATH**/ ?>