<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::redirect('/dashboard', '/sales');

Route::get('/sales', function () {
    return view('coffee_sales');
})->middleware(['auth'])->name('coffee.sales');

Route::get('/shipping-partners', [SupplierController::class, 'index'])
    ->middleware(['auth'])
    ->name('shipping.partners');

Route::post('/product/store', [ProductController::class, 'store'])
    ->middleware(['auth'])
    ->name('product.store');

require __DIR__.'/auth.php';
