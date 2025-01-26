<?php $__env->startSection('title', __('Cheese and Labneh')); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1"><?php echo app('translator')->get('Cheese and Labneh'); ?></div>
        <a href="<?php echo e(route('cheeses.create')); ?>" class="btn btn-primary"><?php echo app('translator')->get('Create'); ?></a>
        <a href="<?php echo e(route('cheeses.print')); ?>" class="btn btn-success mx-2"><?php echo app('translator')->get('Print'); ?></a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class="mb-3">
                <form action="<?php echo e(route('cheeses.index')); ?>" role="form">
                    <input type="search" name="search_query" value="<?php echo e(Request::get('search_query')); ?>"
                        class="form-control w-auto" placeholder="<?php echo app('translator')->get('Search...'); ?>" autocomplete="off">
                </form>
            </div>
            <div class=" table-responsive">
                <table class="table table-hover table-striped table-hover-x">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Name'); ?></th>
                            <th><?php echo app('translator')->get('Order'); ?></th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php $__currentLoopData = $cheeses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cheese): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="align-middle fw-bold py-3"><?php echo e($cheese->name); ?> - <?php echo e($cheese->unit); ?> </td>
                                <td class="align-middle fw-bold"><?php echo e($cheese->order); ?> </td>
                                
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
                                                <a class="dropdown-item"
                                                    href="<?php echo e(route('cheeses.edit', $cheese)); ?>">
                                                    <?php echo app('translator')->get('Edit'); ?>
                                                </a>
                                            </li>
                                            <?php if (\Illuminate\Support\Facades\Blade::check('can_edit')): ?>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <form
                                                        action="<?php echo e(route('cheeses.destroy', $cheese)); ?>"
                                                        method="POST" id="form-<?php echo e($cheese->id); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="button"
                                                            class="btn btn-link p-0 m-0 w-100 text-start text-decoration-none text-danger"
                                                            onclick="submitDeleteForm('<?php echo e($cheese->id); ?>')">
                                                            <?php echo app('translator')->get('Delete'); ?>
                                                        </button>
                                                    </form>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($cheeses->isEmpty()): ?>
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
                <?php echo e($cheeses->withQueryString()->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        function submitDeleteForm(id) {
            const form = document.querySelector(`#form-${id}`);
            Swal.fire(swalConfig()).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                } else {
                    topbar.hide();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/cheeses/index.blade.php ENDPATH**/ ?>