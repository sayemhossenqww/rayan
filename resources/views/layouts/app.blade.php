<!DOCTYPE html>
<html lang="{{ $settings->lang }}" dir="{{ $settings->dir }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="theme-color" content="#000000"/>
    <title>@yield('title', config('app.name'))</title>
    <link rel="preload" href="{{ $cssUrl }}" as="style" />
    <link rel="stylesheet" href="{{ $cssUrl }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('rayahen.ico') }}" >
    <link rel="manifest" href="/manifest.json">
    @include('layouts.lang-tag')
    @stack('style')
    @stack('head')
</head>

<body class="x-body">
    <div class="h-100" id="app">
        @auth
            <div class="x-sidebar border-end bg-white">
                @include('layouts.sidebar-items')
            </div>
            <div class="x-container">
                @include('layouts.navbar')
                <div class="x-container-secondary p-3">
                    @include('layouts.alerts')
                    @yield('content')
                </div>
            </div>
        @else
            @yield('content')
        @endauth
    </div>
</body>

</html>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/vfs_fonts.js') }}"></script>
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
@stack('script')
