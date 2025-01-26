<form
    action="<?php echo e(isset($payment) ? route('customers.payments.update', [$customer, $payment]) : route('customers.payments.store', $customer)); ?>"
    method="POST" enctype="multipart/form-data" role="form">
    <?php echo csrf_field(); ?>
    <?php if(isset($payment)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="date" class="form-label"><?php echo app('translator')->get('Date'); ?></label>
            <input type="date" name="date"
                class="form-control form-control-lg <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                value="<?php echo e(old('date', isset($payment) ? $payment->date : now()->format('Y-m-d'))); ?>">
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
        <div class="col-md-6 mb-3">
            <label for="mode" class="form-label"><?php echo app('translator')->get('Payment Mode'); ?></label>
            <select name="mode" id="mode" class=" form-select form-select-lg">
                <?php if(isset($payment)): ?>
                    <option value="" <?php if(is_null($payment->mode)): ?> selected <?php endif; ?>></option>
                    <?php $__currentLoopData = $modes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($mode); ?>" <?php if($payment->mode == $mode): ?> selected <?php endif; ?>>
                            <?php echo e($mode); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <option value="" selected></option>
                    <?php $__currentLoopData = $modes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($mode); ?>"><?php echo e($mode); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
            <?php $__errorArgs = ['mode'];
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

    <div class="mb-3">
        <label for="amount" class="form-label"><?php echo app('translator')->get('Amount'); ?> (<?php echo e($currency); ?>)</label>
        <input type="text" name="amount"
            class="form-control input-number form-control-lg <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php if($settings->dir == 'rtl'): ?> text-start <?php endif; ?>"
            dir="ltr" id="amount" value="<?php echo e(old('amount', isset($payment) ? $payment->amount : '')); ?>">
        <?php $__errorArgs = ['amount'];
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

    <div class="mb-3">
        <label for="comments" class="form-label"><?php echo app('translator')->get('Comments'); ?></label>
        <textarea name="comments" class="form-control <?php $__errorArgs = ['comments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="comments" rows="3"><?php echo e(old('comments', isset($payment) ? $payment->comments : '')); ?></textarea>
        <?php $__errorArgs = ['comments'];
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
    <div class="mb-3">
        <button class="btn btn-primary" type="submit">
            <?php echo app('translator')->get('Save'); ?>
        </button>
    </div>
</form>
<?php /**PATH /var/www/html/wmk/retail-shop/resources/views/customers/payments/partials/form.blade.php ENDPATH**/ ?>