<div class="row">
    <div class="col-md-12 mb-2 text-muted small"><?php echo app('translator')->get('Other Info'); ?></div>
    <div class="col-md-12 mb-3">
        <label for="tax_identification_number" class="form-label"><?php echo app('translator')->get('Tax ID Number'); ?></label>
        <input type="text" name="tax_identification_number"
            class="form-control <?php $__errorArgs = ['tax_identification_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tax_identification_number"
            value="<?php echo e(old('tax_identification_number', isset($customer) ? $customer->tax_identification_number : '')); ?>">
        <?php $__errorArgs = ['tax_identification_number'];
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
    <div class="col-md-12 mb-3">
        <label for="notes" class="form-label"><?php echo app('translator')->get('Notes'); ?></label>
        <textarea name="notes" id="notes" class="form-control <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"><?php echo e(old('notes', isset($customer) ? $customer->notes : '')); ?></textarea>

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
</div>
<?php /**PATH /home3/wmktechn/xsmart.wmktech.net/resources/views/customers/partials/others.blade.php ENDPATH**/ ?>