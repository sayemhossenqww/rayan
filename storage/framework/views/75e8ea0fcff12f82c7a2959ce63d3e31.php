
<?php $__env->startSection('title', __('Edit') . ' ' . __('Purchase')); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1"><?php echo app('translator')->get('Edit'); ?> <?php echo app('translator')->get('Purchase'); ?></div>
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
    <form action="<?php echo e(route('purchases.update', $purchase)); ?>" method="POST" role="form">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="supplier" class="form-label"><?php echo app('translator')->get('Supplier'); ?></label>
                        <select name="supplier" id="supplier" class="form-select">
                            <option value=""><?php echo app('translator')->get('Select Supplier'); ?></option>
                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($supplier->id); ?>" <?php if($purchase->supplier_id == $supplier->id): echo 'selected'; endif; ?>><?php echo e($supplier->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <a href="<?php echo e(route('suppliers.create')); ?>" class="small text-decoration-none">
                            + <?php echo app('translator')->get('Create New Supplier'); ?>
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="date" class="form-label"><?php echo app('translator')->get('Date'); ?></label>
                        <input type="date" name="date" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('date', $purchase->date->format('Y-m-d'))); ?>">
                        <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class=" mb-3">
                    <label for="reference_number" class="form-label"><?php echo app('translator')->get('Reference Number'); ?></label>
                    <input type="text" name="reference_number"
                        class="form-control <?php $__errorArgs = ['reference_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('reference_number', $purchase->reference_number)); ?>">
                    <?php $__errorArgs = ['reference_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex">
                    <div class="form-label flex-grow-1"><?php echo app('translator')->get('Items'); ?>*</div>
                    <div>
                        <a href="<?php echo e(route('products.create')); ?>" class="small text-decoration-none">
                            + <?php echo app('translator')->get('Create New Item'); ?>
                        </a>
                    </div>
                </div>
                <div class=" table-responsive mb-3">

                    <table class="table table-bordered mb-1" id="table-items">
                        <thead>
                            <tr>
                                <th class=" text-center text-decoration-none fw-bold"><?php echo app('translator')->get('Item'); ?></th>
                                <th class=" text-center text-decoration-none fw-bold"><?php echo app('translator')->get('Quantity'); ?></th>
                                <th class=" text-center text-decoration-none fw-bold">
                                    <?php echo app('translator')->get('Unit Cost'); ?> (<?php echo e($currency); ?>)
                                </th>
                                <th class=" text-center text-decoration-none fw-bold"></th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                            <?php $__currentLoopData = $purchase->purchase_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <select class="form-select" name="item[]" required>
                                            <option value=""><?php echo app('translator')->get('Select Item'); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <optgroup label="<?php echo e($category->name); ?>">
                                                    <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($product->id); ?>" <?php if($detail->product_id == $product->id): echo 'selected'; endif; ?>>
                                                            <?php echo e($product->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </optgroup>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"
                                            class=" form-control input-stock focus-select-text text-center"
                                            name="quantity[]" value="<?php echo e($detail->quantity); ?>"
                                            value="<?php echo e($detail->quantity); ?>" required>
                                    </td>
                                    <td>
                                        <input type="text"
                                            class="form-control input-number focus-select-text text-center"
                                            value="<?php echo e($detail->cost); ?>" name="cost[]" required>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link p-0 text-danger btn-remove"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="hero-icon-sm">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg></button>
                                    </td>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary btn-xs" id="btn-new-item">+ <?php echo app('translator')->get('Add New Item'); ?></button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="notes" class="form-label"><?php echo app('translator')->get('Notes'); ?></label>
                    <textarea name="notes" id="notes" class="form-control <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"><?php echo e(old('notes', $purchase->notes)); ?></textarea>

                    <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary px-4"><?php echo app('translator')->get('Save'); ?></button>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        var tbody = document.querySelector('#tbody');
        var newItemBtn = document.querySelector('#btn-new-item');
        newItemBtn.addEventListener('click', function() {
            tbody.insertAdjacentHTML(
                'beforeend',
                '<tr><td><select class="form-select" name="item[]" required> <option value=""><?php echo app('translator')->get('Select Item'); ?></option><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><optgroup label="<?php echo e($category->name); ?>"><?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($product->id); ?>" <?php if($detail->product_id == $product->id): echo 'selected'; endif; ?>><?php echo e($product->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></optgroup><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><input type="text" class=" form-control input-stock focus-select-text text-center" name="quantity[]" value="<?php echo e($detail->quantity); ?>" required></td><td><input type="text" class="form-control input-number focus-select-text text-center" value="<?php echo e($detail->cost); ?>" name="cost[]" required></td>' +
                '<td><button type="button" class="btn btn-link p-0 text-danger btn-remove"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hero-icon-sm"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></button></td></tr>'
            );

            var keys = '0123456789.';
            var checkInputNumber = function(e) {
                var key = typeof e.which == 'number' ? e.which : e.keyCode;
                var start = this.selectionStart,
                    end = this.selectionEnd;
                var filtered = this.value.split('').filter(filterInput);
                this.value = filtered.join('');
                var move = filterInput(String.fromCharCode(key)) || key == 0 || key == 8 ? 0 : 1;
                this.setSelectionRange(start - move, end - move);
            };
            var filterInput = function(val) {
                return keys.indexOf(val) > -1;
            };
            var formControlOnFocusList = [].slice.call(document.querySelectorAll('.focus-select-text'));
            formControlOnFocusList.map(function(formControlOnFocusElement) {
                formControlOnFocusElement.addEventListener('focus', () => {
                    formControlOnFocusElement.select();
                });
            });
            var numberInputList = [].slice.call(document.querySelectorAll('.input-number'));
            numberInputList.map(function(numberInputElement) {
                numberInputElement.addEventListener('input', checkInputNumber);
            });

            var stockKeys = '0123456789.-';
            var checkInputStock = function(e) {
                var key = typeof e.which == 'number' ? e.which : e.keyCode;
                var start = this.selectionStart,
                    end = this.selectionEnd;
                var filtered = this.value.split('').filter(filterInputStock);
                this.value = filtered.join('');
                var move = filterInputStock(String.fromCharCode(key)) || key == 0 || key == 8 ? 0 : 1;
                this.setSelectionRange(start - move, end - move);
            };
            var filterInputStock = function(val) {
                return stockKeys.indexOf(val) > -1;
            };

            var stockInputList = [].slice.call(document.querySelectorAll('.input-stock'));
            stockInputList.map(function(numberInputElement) {
                numberInputElement.addEventListener('input', checkInputStock);
            });
        });
        document.addEventListener('click', function(event) {
            if (event.target.matches('.btn-remove, .btn-remove *')) {
                event.target.closest('tr').remove();
            }
        }, false);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Max\Desktop\retail-shop\resources\views/purchases/edit.blade.php ENDPATH**/ ?>