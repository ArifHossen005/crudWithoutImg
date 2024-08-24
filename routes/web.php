<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;




Route::get('products/add', [ProductController::class, 'create'])->name('products.add');

Route::post('store', [ProductController::class, 'store'])->name('products.store');

Route::get('products', [ProductController::class, 'manage'])->name('products.manage');

Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::post('products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

