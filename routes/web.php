<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login.attempt');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'show'])->name('home');
    Route::view('/about', 'about.show')->name('about');
    Route::view('/industry', 'home.industry')->name('industry');
    Route::get('/point-of-sale', [\App\Http\Controllers\PointOfSaleController::class, 'show'])->name('pos.show');
    Route::post('logout', [\App\Http\Controllers\Auth\LogOutController::class, 'logout'])->name('logout');


    Route::get('password/confirm', [\App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [\App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm']);

    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('/categories/{category}/products', [\App\Http\Controllers\CategoryController::class, 'products'])->name('categories.products.index');
    Route::put('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::delete('/categories/{category}/image', [\App\Http\Controllers\CategoryController::class, 'imageDestroy'])->name('categories.image.destroy');


    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
    Route::delete('/products/{product}/image', [\App\Http\Controllers\ProductController::class, 'imageDestroy'])->name('products.image.destroy');


    Route::get('/customers', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::get('/customers/print', [\App\Http\Controllers\CustomerController::class, 'printInfo'])->name('customers.print.info');
    Route::get('/customers/{customer}/edit', [\App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::get('/customers/{customer}', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
    Route::delete('/customers/{customer}', [\App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/customers/{customer}/orders', [\App\Http\Controllers\CustomerOrderController::class, 'index'])->name('customers.orders.index');
    Route::get('/customers/{customer}/quotations', [\App\Http\Controllers\CustomerOrderController::class, 'index1'])->name('customers.quotations.index');
    Route::get('/customers/{customer}/payments', [\App\Http\Controllers\CustomerPaymentController::class, 'index'])->name('customers.payments.index');
    Route::post('/customers/{customer}/payments', [\App\Http\Controllers\CustomerPaymentController::class, 'store'])->name('customers.payments.store');
    Route::get('/customers/{customer}/payments/create', [\App\Http\Controllers\CustomerPaymentController::class, 'create'])->name('customers.payments.create');
    Route::get('/customers/{customer}/payments/filter', [\App\Http\Controllers\CustomerPaymentController::class, 'filter'])->name('customers.payments.filter');
    Route::get('/customers/{customer}/payments/filter-print', [\App\Http\Controllers\CustomerPaymentController::class, 'filterPrint'])->name('customers.payments.filter.print');
    Route::get('/customers/{customer}/payments/{payment}/edit', [\App\Http\Controllers\CustomerPaymentController::class, 'edit'])->name('customers.payments.edit');
    Route::get('/customers/{customer}/payments/{payment}/print', [\App\Http\Controllers\CustomerPaymentController::class, 'print'])->name('customers.payments.print');
    Route::put('/customers/{customer}/payments/{payment}', [\App\Http\Controllers\CustomerPaymentController::class, 'update'])->name('customers.payments.update');
    Route::delete('/customers/{customer}/payments/{payment}', [\App\Http\Controllers\CustomerPaymentController::class, 'destroy'])->name('customers.payments.destroy');

    Route::get('/suppliers/{supplier}/payments/{payment}/print', [\App\Http\Controllers\SupplierPaymentController::class, 'print'])->name('suppliers.payments.print');
    Route::delete('/suppliers/{supplier}/payments/{payment}', [\App\Http\Controllers\SupplierPaymentController::class, 'destroy'])->name('suppliers.payments.destroy');

    Route::get('/customers/{customer}/statements', [\App\Http\Controllers\CustomerAccountStatementController::class, 'index'])->name('customers.statements.index');
    Route::get('/customers/{customer}/statements/{statement}/print', [\App\Http\Controllers\CustomerAccountStatementController::class, 'print'])->name('customers.statements.print');
    Route::get('/customers/{customer}/statements/filter', [\App\Http\Controllers\CustomerAccountStatementController::class, 'filter'])->name('customers.statements.filter');
    Route::get('/customers/{customer}/statements/filter-print', [\App\Http\Controllers\CustomerAccountStatementController::class, 'filterPrint'])->name('customers.statements.filter.print');

    Route::get('/cowfarms', [\App\Http\Controllers\CowFarmController::class, 'index'])->name('cowfarms.index');

    Route::get('/manupack', [\App\Http\Controllers\ManupackController::class, 'index'])->name('manupack.index');
    Route::get('/manupack/create', [\App\Http\Controllers\ManupackController::class, 'create'])->name('manupack.create');
    Route::post('/manupack', [\App\Http\Controllers\ManupackController::class, 'store'])->name('manupack.store');
    Route::get('/manupack/{coffee_bag}/edit', [\App\Http\Controllers\ManupackController::class, 'edit'])->name('manupack.edit');
    Route::put('/manupack/{coffee_bag}', [\App\Http\Controllers\ManupackController::class, 'update'])->name('manupack.update');
    Route::delete('/manupack/{coffee_bag}', [\App\Http\Controllers\ManupackController::class, 'destroy'])->name('manupack.destroy');

    Route::get('/roots', [\App\Http\Controllers\RootController::class, 'index'])->name('roots.index');
    Route::get('/roots/create', [\App\Http\Controllers\RootController::class, 'create'])->name('roots.create');
    Route::post('/roots', [\App\Http\Controllers\RootController::class, 'store'])->name('roots.store');
    Route::get('/roots/{root}/edit', [\App\Http\Controllers\RootController::class, 'edit'])->name('roots.edit');
    Route::delete('/roots/{root}', [\App\Http\Controllers\RootController::class, 'destroy'])->name('roots.destroy');
    Route::put('/roots/{root}', [\App\Http\Controllers\RootController::class, 'update'])->name('roots.update');

    Route::get('/lines', [\App\Http\Controllers\LineController::class, 'index'])->name('lines.index');
    Route::get('/lines/create', [\App\Http\Controllers\LineController::class, 'create'])->name('lines.create');
    Route::post('/lines', [\App\Http\Controllers\LineController::class, 'store'])->name('lines.store');
    Route::delete('/lines/{line}', [\App\Http\Controllers\LineController::class, 'destroy'])->name('lines.destroy');
    Route::get('/lines/{line}/edit', [\App\Http\Controllers\LineController::class, 'edit'])->name('lines.edit');
    Route::put('/lines/{line}', [\App\Http\Controllers\LineController::class, 'update'])->name('lines.update');

    Route::get('/salesmen', [\App\Http\Controllers\SalesmanController::class, 'index'])->name('salesmen.index');
    // Route::group(['middleware' => ['password.confirm']], function () {
        Route::get('/salesmen/create', [\App\Http\Controllers\SalesmanController::class, 'create'])->name('salesmen.create');
        // Route::put('/salesman/{root}', [\App\Http\Controllers\SalesmanController::class, 'update'])->name('salesman.update');
        Route::post('/salesmen', [\App\Http\Controllers\SalesmanController::class, 'store'])->name('salesmen.store');
        Route::delete('/salesmen/{salesman}', [\App\Http\Controllers\SalesmanController::class, 'destroy'])->name('salesmen.destroy');
        Route::get('/salesmen/{salesman}/edit', [\App\Http\Controllers\SalesmanController::class, 'edit'])->name('salesmen.edit');
        Route::put('/salesmen/{salesman}', [\App\Http\Controllers\SalesmanController::class, 'update'])->name('salesmen.update');
    // });

    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/quotations', [\App\Http\Controllers\OrderController::class, 'index1'])->name('quotations.index');
    Route::get('/orders/analytics', [\App\Http\Controllers\OrderController::class, 'showAnalytics'])->name('orders.analytics');

    Route::get('/orders/filter', [\App\Http\Controllers\OrderController::class, 'filter'])->name('orders.filter');
    Route::get('/orders/print/stats', [\App\Http\Controllers\OrderController::class, 'printStats'])->name('orders.print.stats');
    Route::get('/orders/print/{order}', [\App\Http\Controllers\OrderController::class, 'print'])->name('orders.print');
    Route::get('/quotations/print/{order}', [\App\Http\Controllers\OrderController::class, 'print1'])->name('quotations.print');
    Route::get('/quotations/convert/{order}', [\App\Http\Controllers\OrderController::class, 'convert'])->name('quotations.convert');

    Route::get('/orders/edit/{order}', [\App\Http\Controllers\OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/update/{order}', [\App\Http\Controllers\OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    Route::get('/quotations/{order}', [\App\Http\Controllers\OrderController::class, 'show1'])->name('quotations.show');
    Route::delete('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy');


    Route::get('/settings', [\App\Http\Controllers\SettingsController::class, 'show'])->name('settings.show');
    Route::put('/settings/pos', [\App\Http\Controllers\SettingsController::class, 'updatePos'])->name('settings.pos.update');
    Route::put('/settings/currency', [\App\Http\Controllers\SettingsController::class, 'updateCurrency'])->name('settings.currency.update');
    Route::put('/settings/identification', [\App\Http\Controllers\SettingsController::class, 'updateIdentification'])->name('settings.identification.update');
    Route::put('/settings/date', [\App\Http\Controllers\SettingsController::class, 'updateDate'])->name('settings.date.update');
    Route::put('/settings/exchange-rate', [\App\Http\Controllers\SettingsController::class, 'updateExchangeRate'])->name('settings.exchange-rate.update');


    Route::get('/change-password', [\App\Http\Controllers\PasswordController::class, 'show'])->name('password.show');
    Route::put('/change-password', [\App\Http\Controllers\PasswordController::class, 'update'])->name('password.update');
    Route::group(['middleware' => ['password.confirm']], function () {
        Route::get('/drawer', [\App\Http\Controllers\DrawerController::class, 'show'])->name('drawer.show');
        Route::post('/drawer/close', [\App\Http\Controllers\DrawerController::class, 'close'])->name('drawer.close');
        Route::get('/drawer/{drawerHistory}/print', [\App\Http\Controllers\DrawerController::class, 'print'])->name('drawer.print');
    });
    Route::get('/expenses', [\App\Http\Controllers\ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [\App\Http\Controllers\ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/expenses/create', [\App\Http\Controllers\ExpenseController::class, 'create'])->name('expenses.create');
    // Route::get('/expenses/archive', [\App\Http\Controllers\ExpenseController::class, 'archive'])->name('expenses.archive');
    Route::get('/expenses/{expense}/print', [\App\Http\Controllers\ExpenseController::class, 'print'])->name('expenses.print');
    // Route::get('/expenses/{expense}/archive', [\App\Http\Controllers\ExpenseController::class, 'updateArchive'])->name('expenses.update.archive');
    Route::get('/expenses/filter', [\App\Http\Controllers\ExpenseController::class, 'filter'])->name('expenses.filter');
    Route::get('/expenses/filter-print', [\App\Http\Controllers\ExpenseController::class, 'filterPrint'])->name('expenses.filter.print');
    Route::delete('/expenses/{expense}', [\App\Http\Controllers\ExpenseController::class, 'destroy'])->name('expenses.destroy');


    Route::get('/payments', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments', [\App\Http\Controllers\PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/create', [\App\Http\Controllers\PaymentController::class, 'create'])->name('payments.create');
    Route::get('/payments/{payment}/edit', [\App\Http\Controllers\PaymentController::class, 'edit'])->name('payments.edit');
    Route::post('/payments/{payment}', [\App\Http\Controllers\PaymentController::class, 'update'])->name('payments.update');
    Route::get('/payments/filter', [\App\Http\Controllers\PaymentController::class, 'filter'])->name('payments.filter');
    Route::get('/payments/filter-print', [\App\Http\Controllers\PaymentController::class, 'filterPrint'])->name('payments.filter.print');

    Route::get('/supplier-payments', [\App\Http\Controllers\SupplierPaymentController::class, 'index'])->name('supplier-payments.index');
    Route::post('/supplier-payments', [\App\Http\Controllers\SupplierPaymentController::class, 'store'])->name('supplier-payments.store');
    Route::get('/supplier-payments/create', [\App\Http\Controllers\SupplierPaymentController::class, 'create'])->name('supplier-payments.create');
    Route::get('/supplier-payments/{payment}/edit', [\App\Http\Controllers\SupplierPaymentController::class, 'edit'])->name('supplier-payments.edit');
    Route::post('/supplier-payments/{payment}', [\App\Http\Controllers\SupplierPaymentController::class, 'update'])->name('supplier-payments.update');
    Route::get('/supplier-payments/filter', [\App\Http\Controllers\SupplierPaymentController::class, 'filter'])->name('supplier-payments.filter');
    Route::get('/supplier-payments/filter-print', [\App\Http\Controllers\SupplierPaymentController::class, 'filterPrint'])->name('supplier-payments.filter.print');

    Route::get('/suppliers', [\App\Http\Controllers\SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/create', [\App\Http\Controllers\SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers', [\App\Http\Controllers\SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/{supplier}', [\App\Http\Controllers\SupplierController::class, 'show'])->name('suppliers.show');
    Route::get('/suppliers/{supplier}/edit', [\App\Http\Controllers\SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/{supplier}', [\App\Http\Controllers\SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/suppliers/{supplier}', [\App\Http\Controllers\SupplierController::class, 'destroy'])->name('suppliers.destroy');


    Route::get('/purchases', [\App\Http\Controllers\PurchaseController::class, 'index'])->name('purchases.index');
    Route::get('/purchases/create', [\App\Http\Controllers\PurchaseController::class, 'create'])->name('purchases.create');
    Route::post('/purchases', [\App\Http\Controllers\PurchaseController::class, 'store'])->name('purchases.store');
    Route::get('/purchases/{purchase}', [\App\Http\Controllers\PurchaseController::class, 'show'])->name('purchases.show');
    Route::get('/purchases/{purchase}/edit', [\App\Http\Controllers\PurchaseController::class, 'edit'])->name('purchases.edit');
    Route::get('/purchases/{purchase}/print', [\App\Http\Controllers\PurchaseController::class, 'print'])->name('purchases.print');
    Route::put('/purchases/{purchase}', [\App\Http\Controllers\PurchaseController::class, 'update'])->name('purchases.update');
    Route::delete('/purchases/{purchase}', [\App\Http\Controllers\PurchaseController::class, 'destroy'])->name('purchases.destroy');


    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('sales-report', [\App\Http\Controllers\SalesController::class, 'index'])->name('sales.index');
    Route::get('sales-report/filter', [\App\Http\Controllers\SalesController::class, 'filter'])->name('sales.filter');
    Route::get('sales-report/{date}', [\App\Http\Controllers\SalesController::class, 'show'])->name('sales.show');

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/employees', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
    Route::post('/employees', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/create', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create');
    Route::delete('/employees/{employee}', [\App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('/employees/{employee}/edit', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [\App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');

    Route::get('/staffs', [\App\Http\Controllers\StaffController::class, 'index'])->name('staffs.index');
    Route::post('/staffs', [\App\Http\Controllers\StaffController::class, 'store'])->name('staffs.store');
    Route::get('/staffs/create', [\App\Http\Controllers\StaffController::class, 'create'])->name('staffs.create');
    Route::delete('/staffs/{staff}', [\App\Http\Controllers\StaffController::class, 'destroy'])->name('staffs.destroy');
    Route::get('/staffs/{staff}/edit', [\App\Http\Controllers\StaffController::class, 'edit'])->name('staffs.edit');
    Route::get('/staffs/{staff}/attendance/{year?}/{month?}/print', [\App\Http\Controllers\StaffController::class, 'print'])->name('staffs.attendance.print');
    Route::get('/staffs/{staff}/attendance/{year?}/{month?}', [\App\Http\Controllers\StaffController::class, 'attendance'])->name('staffs.attendance');
    Route::get('/staffs/{staff}/milk_detail/{year?}/{week?}', [\App\Http\Controllers\StaffController::class, 'milkDetail'])->name('staffs.milk.details');
    Route::get('/staffs/{attendance}/{day?}', [\App\Http\Controllers\StaffController::class, 'doAttendance'])->name('staffs.do.attendance');
    Route::get('/staffs/milk_detail/{milk_detail}/{day?}', [\App\Http\Controllers\StaffController::class, 'doMilkDetail'])->name('staffs.do.detail');
    Route::put('/staffs/{staff}', [\App\Http\Controllers\StaffController::class, 'update'])->name('staffs.update');
    
    Route::get('/cheeses', [\App\Http\Controllers\CheeseController::class, 'index'])->name('cheeses.index');
    Route::get('/cheeses/print', [\App\Http\Controllers\CheeseController::class, 'print'])->name('cheeses.print');
    Route::post('/cheeses', [\App\Http\Controllers\CheeseController::class, 'store'])->name('cheeses.store');
    Route::get('/cheeses/create', [\App\Http\Controllers\CheeseController::class, 'create'])->name('cheeses.create');
    Route::get('/cheeses/{cheese}/edit', [\App\Http\Controllers\CheeseController::class, 'edit'])->name('cheeses.edit');
    Route::delete('/cheeses/{cheese}', [\App\Http\Controllers\CheeseController::class, 'destroy'])->name('cheeses.destroy');
    Route::put('/cheeses/{cheese}', [\App\Http\Controllers\CheeseController::class, 'update'])->name('cheeses.update');
    
    Route::get('/attendances/{attendance}/{day?}/show', [\App\Http\Controllers\StaffAttendanceController::class, 'show'])->name('attendances.show');
    Route::get('/attendances/{year?}/{month?}/{day?}', [\App\Http\Controllers\StaffAttendanceController::class, 'index'])->name('attendances.index');
    Route::put('/attendances/{attendance}', [\App\Http\Controllers\StaffAttendanceController::class, 'update'])->name('attendances.update');
    Route::put('/attendances/{attendance}/in', [\App\Http\Controllers\StaffAttendanceController::class, 'in'])->name('attendances.in');
    Route::put('/attendances/{attendance}/out', [\App\Http\Controllers\StaffAttendanceController::class, 'out'])->name('attendances.out');
    
    Route::get('/milk_details/{year?}/{week?}', [\App\Http\Controllers\MilkDetailController::class, 'index'])->name('milk_details.index');
    Route::get('/milk_details/{year?}/{week?}/print', [\App\Http\Controllers\MilkDetailController::class, 'print'])->name('milk_details.print');
    Route::put('/milk_details/{detail}', [\App\Http\Controllers\MilkDetailController::class, 'update'])->name('milk_detail.update');

    Route::get('/dairy_industry/{year?}/{week?}', [\App\Http\Controllers\DairyIndustryController::class, 'index'])->name('dairy_industry.index');
    Route::get('/dairy_industry/{year?}/{week?}/print', [\App\Http\Controllers\DairyIndustryController::class, 'print'])->name('dairy_industry.print');
    Route::get('/dairy_industry/{dairy}/edit/{day}', [\App\Http\Controllers\DairyIndustryController::class, 'edit'])->name('dairy_industry.edit');
    Route::put('/dairy_industry/{dairy}', [\App\Http\Controllers\DairyIndustryController::class, 'update'])->name('dairy_industry.update');

    Route::get('/cheese_process/{year?}/{week?}', [\App\Http\Controllers\CheeseProcessController::class, 'index'])->name('cheese_process.index');
    Route::get('/cheese_process/{year?}/{week?}/print', [\App\Http\Controllers\CheeseProcessController::class, 'print'])->name('cheese_process.print');
    Route::get('/cheese_process/{cheese}/edit/{day}', [\App\Http\Controllers\CheeseProcessController::class, 'edit'])->name('cheese_process.edit');
    Route::put('/cheese_process/{cheese}', [\App\Http\Controllers\CheeseProcessController::class, 'update'])->name('cheese_process.update');

    Route::get('/gouda_regular/{year?}/{week?}', [\App\Http\Controllers\GoudaRegularController::class, 'index'])->name('gouda_regular.index');
    Route::get('/gouda_regular/{year?}/{week?}/print', [\App\Http\Controllers\GoudaRegularController::class, 'print'])->name('gouda_regular.print');
    Route::get('/gouda_regular/{regular}/edit/{day}', [\App\Http\Controllers\GoudaRegularController::class, 'edit'])->name('gouda_regular.edit');
    Route::put('/gouda_regular/{regular}', [\App\Http\Controllers\GoudaRegularController::class, 'update'])->name('gouda_regular.update');

    Route::get('/kishek/{year?}/{week?}', [\App\Http\Controllers\KishekController::class, 'index'])->name('kishek.index');
    Route::get('/kishek/{year?}/{week?}/print', [\App\Http\Controllers\KishekController::class, 'print'])->name('kishek.print');
    Route::get('/kishek/{kishek}/edit/{day}', [\App\Http\Controllers\KishekController::class, 'edit'])->name('kishek.edit');
    Route::put('/kishek/{kishek}', [\App\Http\Controllers\KishekController::class, 'update'])->name('kishek.update');

    Route::get('/laban_process/{year?}/{week?}', [\App\Http\Controllers\LabanProcessController::class, 'index'])->name('laban_process.index');
    Route::get('/laban_process/{year?}/{week?}/print', [\App\Http\Controllers\LabanProcessController::class, 'print'])->name('laban_process.print');
    Route::get('/laban_process/{laban}/edit/{day}', [\App\Http\Controllers\LabanProcessController::class, 'edit'])->name('laban_process.edit');
    Route::put('/laban_process/{laban}', [\App\Http\Controllers\LabanProcessController::class, 'update'])->name('laban_process.update');

    Route::get('/labneh_process/{year?}/{week?}', [\App\Http\Controllers\LabnehProcessController::class, 'index'])->name('labneh_process.index');
    Route::get('/labneh_process/{year?}/{week?}/print', [\App\Http\Controllers\LabnehProcessController::class, 'print'])->name('labneh_process.print');
    Route::get('/labneh_process/{labneh}/edit/{day}', [\App\Http\Controllers\LabnehProcessController::class, 'edit'])->name('labneh_process.edit');
    Route::put('/labneh_process/{labneh}', [\App\Http\Controllers\LabnehProcessController::class, 'update'])->name('labneh_process.update');

    Route::get('/margarine/{year?}/{week?}', [\App\Http\Controllers\MargarineController::class, 'index'])->name('margarine.index');
    Route::get('/margarine/{year?}/{week?}/print', [\App\Http\Controllers\MargarineController::class, 'print'])->name('margarine.print');
    Route::get('/margarine/{margarine}/edit/{day}', [\App\Http\Controllers\MargarineController::class, 'edit'])->name('margarine.edit');
    Route::put('/margarine/{margarine}', [\App\Http\Controllers\MargarineController::class, 'update'])->name('margarine.update');

    Route::get('/comte/{year?}/{week?}', [\App\Http\Controllers\LeComteController::class, 'index'])->name('comte.index');
    Route::get('/comte/{year?}/{week?}/print', [\App\Http\Controllers\LeComteController::class, 'print'])->name('comte.print');
    Route::get('/comte/{comte}/edit/{day}', [\App\Http\Controllers\LeComteController::class, 'edit'])->name('comte.edit');
    Route::put('/comte/{comte}', [\App\Http\Controllers\LeComteController::class, 'update'])->name('comte.update');

    Route::get('/raclette/{year?}/{week?}', [\App\Http\Controllers\RacletteController::class, 'index'])->name('raclette.index');
    Route::get('/raclette/{year?}/{week?}/print', [\App\Http\Controllers\RacletteController::class, 'print'])->name('raclette.print');
    Route::get('/raclette/{raclette}/edit/{day}', [\App\Http\Controllers\RacletteController::class, 'edit'])->name('raclette.edit');
    Route::put('/raclette/{raclette}', [\App\Http\Controllers\RacletteController::class, 'update'])->name('raclette.update');

    Route::get('/serum/{year?}/{week?}', [\App\Http\Controllers\SerumController::class, 'index'])->name('serum.index');
    Route::get('/serum/{year?}/{week?}/print', [\App\Http\Controllers\SerumController::class, 'print'])->name('serum.print');
    Route::get('/serum/{serum}/edit/{day}', [\App\Http\Controllers\SerumController::class, 'edit'])->name('serum.edit');
    Route::put('/serum/{serum}', [\App\Http\Controllers\SerumController::class, 'update'])->name('serum.update');

    Route::get('/shankleesh/{year?}/{week?}', [\App\Http\Controllers\ShankleeshController::class, 'index'])->name('shankleesh.index');
    Route::get('/shankleesh/{year?}/{week?}/print', [\App\Http\Controllers\ShankleeshController::class, 'print'])->name('shankleesh.print');
    Route::get('/shankleesh/{shankleesh}/edit/{day}', [\App\Http\Controllers\ShankleeshController::class, 'edit'])->name('shankleesh.edit');
    Route::put('/shankleesh/{shankleesh}', [\App\Http\Controllers\ShankleeshController::class, 'update'])->name('shankleesh.update');

    Route::get('/tomme/{year?}/{week?}', [\App\Http\Controllers\TommeController::class, 'index'])->name('tomme.index');
    Route::get('/tomme/{year?}/{week?}/print', [\App\Http\Controllers\TommeController::class, 'print'])->name('tomme.print');
    Route::get('/tomme/{tomme}/edit/{day}', [\App\Http\Controllers\TommeController::class, 'edit'])->name('tomme.edit');
    Route::put('/tomme/{tomme}', [\App\Http\Controllers\TommeController::class, 'update'])->name('tomme.update');

    Route::get('/inventory', [\App\Http\Controllers\InventoryController::class, 'show'])->name('inventory.index');
    Route::post('/inventory/close', [\App\Http\Controllers\InventoryController::class, 'close'])->name('inventory.close');
    Route::get('/inventory/{inventoryHistory}/print', [\App\Http\Controllers\InventoryController::class, 'print'])->name('inventory.print');
    // Route::get('/inventory', [\App\Http\Controllers\InventoryController:class, 'index']))->name('inventory.index');

    // mouneh_industry
    Route::get('/nuts-industry-mixer', [\App\Http\Controllers\NutsIndustryMixerController::class, 'index'])->name('nuts-industry-mixer.index');
    Route::get('/nuts-industry-mixer/print', [\App\Http\Controllers\NutsIndustryMixerController::class, 'print'])->name('nuts-industry-mixer.print');
    Route::post('/nuts-industry-mixer', [\App\Http\Controllers\NutsIndustryMixerController::class, 'store'])->name('nuts-industry-mixer.store');
    Route::get('/nuts-industry-mixer/create', [\App\Http\Controllers\NutsIndustryMixerController::class, 'create'])->name('nuts-industry-mixer.create');
    Route::get('/nuts-industry-mixer/{mounehIndustry}/edit', [\App\Http\Controllers\NutsIndustryMixerController::class, 'edit'])->name('nuts-industry-mixer.edit');
    Route::delete('/nuts-industry-mixer/{mounehIndustry}', [\App\Http\Controllers\NutsIndustryMixerController::class, 'destroy'])->name('nuts-industry-mixer.destroy');
    Route::put('/nuts-industry-mixer/{mounehIndustry}', [\App\Http\Controllers\NutsIndustryMixerController::class, 'update'])->name('nuts-industry-mixer.update');

    //API
    Route::get('/inventory/categories', [\App\Http\Controllers\InventoryController::class, 'getCategories']);
    Route::get('/inventory/products', [\App\Http\Controllers\InventoryController::class, 'getProducts']);
    Route::get('/customers/search/all', [\App\Http\Controllers\CustomerController::class, 'search']);
    Route::post('/customers/create-new', [\App\Http\Controllers\CustomerController::class, 'createNew']);

    Route::get('/database/download', function () {
        return response()->download(database_path('database.sqlite'), 'database.sqlite');
    })->name('database.download');
    Route::get('/storage/link', function () {
        try {
            Artisan::call('storage:link');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Storage has been linked');
    })->name('storage.link');

    Route::get('/products/search/all', [\App\Http\Controllers\ProductController::class, 'search']);

    Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store']);
    Route::post('/settings/starting-cash', [\App\Http\Controllers\SettingsController::class, 'updateStartingCashValue']);

    Route::get('/uploads/{path}', [App\Http\Controllers\ImageController::class, 'show'])->where('path', '.*')->name('image.show');
});