<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/search', [ProductController::class, 'search']);
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::delete('/products/{product}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
