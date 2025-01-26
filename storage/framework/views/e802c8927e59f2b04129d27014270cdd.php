<?php $__env->startSection('title', 'Confirm Password'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container vh-100">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-sm-12">
                <?php echo $__env->make('layouts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card w-100">
                    <div class="card-body">
                        <div class="text-center">
                            <i class="bi bi-shield-lock fs-1"></i>
                        </div>
                        <div class="card-title mb-sm-3 text-center">
                            This is a secure area. Please, confirm your password before continuing
                        </div>
                        <form action="<?php echo e(route('password.confirm')); ?>" method="POST" role="form">
                            <?php echo csrf_field(); ?>

                            <input type="text" name="uri" value="<?php echo e(Request::get('uri')); ?>" class="d-none">

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password"
                                    autocomplete="off" autofocus>
                                <?php $__errorArgs = ['password'];
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
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Projects\Lebanon\Michael\habib0827\Trans food Trading\bin\resources\views/auth/passwords/confirm.blade.php ENDPATH**/ ?>