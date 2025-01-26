<!DOCTYPE html>
<html lang="<?php echo e($settings->lang); ?>" dir="<?php echo e($settings->dir); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="theme-color" content="#000000"/>
    <title><?php echo $__env->yieldContent('title', config('app.name')); ?></title>
    <link rel="preload" href="<?php echo e($cssUrl); ?>" as="style" />
    <link rel="stylesheet" href="<?php echo e($cssUrl); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('rayahen.ico')); ?>" >
    <link rel="manifest" href="/manifest.json">
    <?php echo $__env->make('layouts.lang-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('style'); ?>
    <?php echo $__env->yieldPushContent('head'); ?>
</head>

<body class="x-body">
    <div class="h-100" id="app">
        <?php if(auth()->guard()->check()): ?>
            <div class="x-sidebar border-end bg-white">
                <?php echo $__env->make('layouts.sidebar-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="x-container">
                <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="x-container-secondary p-3">
                    <?php echo $__env->make('layouts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        <?php else: ?>
            <?php echo $__env->yieldContent('content'); ?>
        <?php endif; ?>
    </div>
</body>

</html>
<script src="<?php echo e(mix('js/app.js')); ?>"></script>
<script src="<?php echo e(mix('js/vfs_fonts.js')); ?>"></script>
<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const isNextPhaseChecked = JSON.parse(document.getElementById('is_next_phase').value); // Backend value
        const nextPhaseCheckbox = document.getElementById('next_phase');
        const productsForm = document.getElementById('products_form');
        const submitBtn = document.getElementById('submit_btn');
        const nameInput = document.getElementById('item_name');
        const nameReadonlyInput = document.getElementById('item_name_display');
        const typeOfMounehInput = document.getElementById('type_of_nuts');
        
        // Check if `has_existing_product` exists (for edit form only)
        const hasExistingProductInput = document.getElementById('has_existing_product');
        const hasExistingProduct = hasExistingProductInput
            ? JSON.parse(hasExistingProductInput.value)
            : false;
            
            
         // Disable checkbox if product already exists
        if (hasExistingProduct) {
            nextPhaseCheckbox.disabled = true; // Prevent unchecking if product exists
        }   
        
            
        // Pre-check the checkbox if backend value is true
        if (isNextPhaseChecked) {
            nextPhaseCheckbox.checked = true;
            productsForm.style.display = 'block';
            updateProductName();
            validateFields();
            productsForm.offsetHeight; // Force reflow to correct any design issues
        }
        
        // Update the product name dynamically
        function updateProductName() {
            const mounehTypeValue = typeOfMounehInput.value.trim();
            if (nextPhaseCheckbox.checked) {
                nameInput.value = mounehTypeValue; // Hidden input
                nameReadonlyInput.value = mounehTypeValue; // Read-only display
            }
        }
        
        // Handle checkbox toggle
        nextPhaseCheckbox.addEventListener('change', function () {
            if (this.checked) {
                productsForm.style.display = 'block';
                updateProductName();
                validateFields();
                productsForm.offsetHeight; // Force reflow to correct design issues
            } else {
                productsForm.style.display = 'none';
                submitBtn.disabled = false;
            }
        });
        
        // Listen for changes in type of mouneh input
        typeOfMounehInput.addEventListener('input', function () {
            updateProductName();
        });
        
        // Field validation
        function validateFields() {
            submitBtn.disabled = !(nameInput.value.trim());
        }
        
        nameInput.addEventListener('input', validateFields);
    });
    
    
    
   document.addEventListener('DOMContentLoaded', function () {
        const customerSelect = document.getElementById('customer');
        const employeeSelect = document.getElementById('employee');
    
        function toggleSelects() {
            if (customerSelect.value) {
                employeeSelect.disabled = true; // Disable employee if customer is selected
            } else {
                employeeSelect.disabled = false; // Enable employee
            }
    
            if (employeeSelect.value) {
                customerSelect.disabled = true; // Disable customer if employee is selected
            } else {
                customerSelect.disabled = false; // Enable customer
            }
        }
    
        // Initial toggle based on pre-selected values
        toggleSelects();
    
        // Event listeners for dynamic changes
        customerSelect.addEventListener('change', toggleSelects);
        employeeSelect.addEventListener('change', toggleSelects);
    });
</script>
<?php echo $__env->yieldPushContent('script'); ?>
<?php /**PATH /Applications/htdocs/wmk/pos/resources/views/layouts/app.blade.php ENDPATH**/ ?>