<?php

use App\Http\Controllers\ProductController;
use App\Http\Middleware\HomepageRedirectMiddleware;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
})->middleware('homeRedirect');

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'getProducts'])->name('get.products');
    Route::get('/add-producs', [ProductController::class, 'addProducts'])->name('add.products');
    Route::post('/create-product', [ProductController::class, 'createProduct'])->name('create.product');
    Route::get('/edit-producs/{id}', [ProductController::class, 'editProducts'])->name('edit.products');
    Route::put('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update.product');
    Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
});
