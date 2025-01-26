<form action="<?php echo e(isset($product) ? route('products.update', $product) : route('manupack.store')); ?>" method="POST"
    enctype="multipart/form-data" role="form" onkeydown="return event.key != 'Enter';">
    <?php echo csrf_field(); ?>
    <?php if(isset($product)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch mb-3">
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="card-title h4 text-muted"><?php echo app('translator')->get('Coffee Data'); ?></div>

                <!-- Big Bag (60Kg) Number -->
                <div class="mb-3 row">
                    <label for="bbag_num" class="col-form-label col-sm-4">Big Bag(60Kg) Number</label>
                    <div class="col-sm-8">
                        <input type="number" id="bbag_num" name="bbag_num" class="form-control"
                            value="<?php echo e(old('bbag_num', isset($product) ? $product->bbag_num : '')); ?> " oninput="valueChanged()" />
                    </div>
                </div>

                <!-- Jar (30Kg) Number -->
                <div class="mb-3 row">
                    <label for="jar_num" class="col-form-label col-sm-4">Jar(30Kg) Number</label>
                    <div class="col-sm-8">
                        <input type="number" id="jar_num" name="jar_num" class="form-control"
                            value="<?php echo e(old('jar_num', isset($product) ? $product->jar_num : '')); ?>" />
                    </div>
                </div>

                <!-- Total Amount (g) -->
                <div class="mb-3 row">
                    <label for="total_amount" class="col-form-label col-sm-4">Total Amount(g)</label>
                    <div class="col-sm-8">
                        <input type="text" id="total_amount" name="total_amount" class="form-control" disabled/>
                        <input type="text" id="total_amount_hidden" name="total_amount_hidden" class="form-control" hidden/>
                    </div>
                </div>

                <!-- Total Loss (g) -->
                <div class="mb-3 row">
                    <label for="total_loss" class="col-form-label col-sm-4">Total Loss(g)</label>
                    <div class="col-sm-8">
                        <input type="text" id="total_loss" name="total_loss" class="form-control" disabled/>
                        <input type="text" id="total_loss_hidden" name="total_loss_hidden" class="form-control" hidden/>
                    </div>
                </div>

                <!-- Bag Type -->
                <div class="mb-3 row">
                    <label for="bag_type" class="col-form-label col-sm-4">Bag Type</label>
                    <div class="col-sm-8">
                        <select id="bag_type" name="bag_type" class="form-select">
                            <!-- <?php if(isset($categories)): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->name); ?>" <?php echo e(old('category') == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?> -->
                                <option value="available"><?php echo app('translator')->get('400g-bag'); ?></option>
                                <option value="unavailable"><?php echo app('translator')->get('180g-bag'); ?></option>
                            <!-- <?php endif; ?> -->
                        </select>
                    </div>
                </div>

                <!-- Number of Bags -->
                <div class="mb-3 row">
                    <label for="nob" class="col-form-label col-sm-4">Number of Bags</label>
                    <div class="col-sm-8">
                        <input type="number" id="nob" name="nob" class="form-control"
                            value="<?php echo e(old('nob', isset($product) ? $product->nob : '')); ?>" />
                    </div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>
    </div>

    <div class="mb-3">
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.save-btn','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('save-btn'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php echo app('translator')->get(isset($product) ? 'Update Item' : 'Save Data'); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    </div>
</form>

<?php if(isset($product)): ?>
    <div class="modal" id="removeCategoryImageModal" tabindex="-1" aria-labelledby="removeCategoryImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="removeCategoryImageModalLabel"><?php echo app('translator')->get('Are you sure?'); ?></h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('products.image.destroy', $product)); ?>" method="POST" role="form">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <?php echo app('translator')->get('You cannot undo this action!'); ?>
                    </div>
                    <div class="row p-0 m-0 border-top">
                        <div class="col-6 p-0">
                            <button type="button"
                                class="btn btn-link w-100 m-0 text-danger btn-lg text-decoration-none rounded-0 border-end"
                                data-bs-dismiss="modal"><?php echo app('translator')->get('Cancel'); ?></button>
                        </div>
                        <div class="col-6 p-0">
                            <button type="submit"
                                class="btn btn-link w-100 m-0 text-black btn-lg text-decoration-none rounded-0 border-start">
                                <?php echo app('translator')->get('Remove Image'); ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bbagNumInput = document.getElementById('bbag_num');
            const jarNumInput = document.getElementById('jar_num');
            const totalAmountInput = document.getElementById('total_amount');
            const totalLossInput = document.getElementById('total_loss');
            const totalAmountInputHidden = document.getElementById('total_amount_hidden');
            const totalLossInputHidden = document.getElementById('total_loss_hidden');
            const nobInput = document.getElementById('nob');
            const bagTypeSelect = document.getElementById('bag_type');

            function updateValues() {
                const bbagNum = parseFloat(bbagNumInput.value) || 0;
                const jarNum = parseFloat(jarNumInput.value) || 0;

                // Update total amount (example calculation)
                const totalAmount = (bbagNum * 6000) + (jarNum * 3000);
                totalAmountInput.value = totalAmount;
                totalAmountInputHidden.value = totalAmount;

                // Update total loss (example calculation)
                const totalLoss = totalAmount * 0.2;
                totalLossInput.value = totalLoss;
                totalLossInputHidden.value = totalLoss;

                // Update number of bags (example calculation)
                const bagType = bagTypeSelect.value;
                let nob = 0;
                if (bagType === 'available') {
                    nob = Math.ceil((totalAmount - totalLoss)/400);
                } else if (bagType === 'unavailable') {
                    nob = Math.ceil((totalAmount - totalLoss)/180);
                }
                nobInput.value = nob;
            }

            bbagNumInput.addEventListener('input', updateValues);
            jarNumInput.addEventListener('input', updateValues);
            bagTypeSelect.addEventListener('change', updateValues);

            // Initial update
            updateValues();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH E:\Projects\Lebanon\Michael\Website\habib0827\Trans food Trading\bin\resources\views/manupack/partials/form.blade.php ENDPATH**/ ?>