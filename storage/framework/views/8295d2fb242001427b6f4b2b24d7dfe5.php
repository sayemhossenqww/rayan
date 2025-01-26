<div class="row">
    <div class="col-md-12 mb-2 text-muted small"><?php echo app('translator')->get('Profile'); ?></div>
    <div class="col-md-12 mb-3">
        <label for="name" class="form-label"><?php echo app('translator')->get('Name'); ?>*</label>
        <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
            value="<?php echo e(old('name', isset($customer) ? $customer->name : '')); ?>">
        <?php $__errorArgs = ['name'];
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
        <label for="birthday" class="form-label"><?php echo app('translator')->get('Birthday'); ?></label>
        <input type="date" name="birthday" class="form-control <?php $__errorArgs = ['birthday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="birthday" value="<?php echo e(old('birthday', isset($customer) ? $customer->birthday : '')); ?>">
        <?php $__errorArgs = ['birthday'];
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
        <label for="gender" class="form-label"><?php echo app('translator')->get('Gender'); ?></label>
        <select class="form-select <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gender" name="gender">
            <?php if(isset($customer)): ?>
                <option value="" <?php if(is_null($customer->gender)): ?> selected <?php endif; ?>></option>
                <option value="male" <?php if($customer->is_male): ?> selected <?php endif; ?>><?php echo app('translator')->get('Male'); ?></option>
                <option value="female" <?php if(!$customer->is_female): ?> selected <?php endif; ?>><?php echo app('translator')->get('Female'); ?></option>
            <?php else: ?>
                <option value="" selected></option>
                <option value="male"><?php echo app('translator')->get('Male'); ?></option>
                <option value="female"><?php echo app('translator')->get('Female'); ?></option>
            <?php endif; ?>
        </select>
        <?php $__errorArgs = ['gender'];
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
        <?php echo $__env->make('customers.partials.civil-status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="col-md-6 mb-3">
        <?php echo $__env->make('customers.partials.nationality', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>
<?php /**PATH /home3/wmktechn/xsmart.wmktech.net/resources/views/customers/partials/profile.blade.php ENDPATH**/ ?>