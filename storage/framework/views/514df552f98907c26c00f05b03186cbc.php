<form action="<?php echo e(route('attendances.out', $attendance)); ?>" method="POST" role="form">
    <?php echo csrf_field(); ?>
    <?php if(isset($attendance)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>
    <div class="row">
        <input name="day" type="hidden" value="<?php echo e($day); ?>" />
    </div>

    <div class="mb-12">
        <?php if($attendance['in_'.$day] && !$attendance['out_'.$day]): ?>
            <button type="submit" class="btn btn-danger w-100">
                <?php echo app('translator')->get('Out'); ?>
            </button>
        <?php else: ?>
            <button type="submit" class="btn btn-danger w-100" disabled>
                <?php echo app('translator')->get('Out'); ?>
            </button>
        <?php endif; ?>
    </div>
</form>
<?php /**PATH E:\Apple\PHP\WMK\CowMilkVillage_16092\CowMilkVillage\bin\resources\views/attendances/partials/out.blade.php ENDPATH**/ ?>