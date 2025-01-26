<?php
    $statuses = ['Single', 'Married', 'Separated', 'Widow'];
?>

<label for="civil_status" class="form-label"><?php echo app('translator')->get('Civil Status'); ?></label>
<select class="form-select <?php $__errorArgs = ['civil_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="civil_status" name="civil_status">
    <?php if(isset($customer)): ?>
        <option value="" <?php if(is_null($customer->status)): ?> selected <?php endif; ?>></option>
        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($status); ?>" <?php if($customer->civil_status == $status): ?> selected <?php endif; ?>>
                <?php echo e($status); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <option value="" selected></option>
        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($status); ?>"><?php echo e($status); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</select>
<?php $__errorArgs = ['civil_status'];
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
<?php /**PATH D:\Work\XSmart\XSmarl-F1\bin\resources\views/customers/partials/civil-status.blade.php ENDPATH**/ ?>