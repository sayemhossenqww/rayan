<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('orders', [\App\Http\Controllers\API\V1\OrderController::class, 'index'])->name('api.orders.index');
Route::get('quotations', [\App\Http\Controllers\API\V1\OrderController::class, 'index1'])->name('api.quotations.index');
Route::get('products', [\App\Http\Controllers\API\V1\ProductController::class, 'index'])->name('api.products.index');
Route::get('categories', [\App\Http\Controllers\API\V1\CategoryController::class, 'index'])->name('api.categories.index');
Route::get('salesman', [\App\Http\Controllers\API\V1\SalesmanController::class, 'index'])->name('api.salesman.index');
Route::get('/salesmen', [\App\Http\Controllers\API\V1\SalesmanController::class, 'getSalesmen']);
Route::get('roots', [\App\Http\Controllers\API\V1\RootController::class, 'index'])->name('api.roots.index');
Route::get('lines', [\App\Http\Controllers\API\V1\LineController::class, 'index'])->name('api.lines.index');
Route::get('manupack', [\App\Http\Controllers\API\V1\ManupackController::class, 'index'])->name('api.manupack.index');
