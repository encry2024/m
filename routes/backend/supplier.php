<?php

use App\Http\Controllers\Backend\Supplier\SupplierController;
use App\Http\Controllers\Backend\ProductSupplier\ProductSupplierController;

/*
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'prefix'     => 'supplier',
    'namespace'  => 'Supplier',
], function () {

    // Supplier Resource

    Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::get('/{supplier}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');

    Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');

    Route::delete('/{supplier}/delete', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    Route::group([
        'as'        =>  'supplier.',
        'prefix'    =>  'product',
        'namespace' =>  'Supplier'
    ], function () {
        Route::get('/', [ProductSupplierController::class, 'index'])->name('product.index');
        Route::get('/{supplier}/product/{product}', [ProductSupplierController::class, 'show'])->name('product.show');
        Route::get('/{supplier}/product/{product}/edit', [ProductSupplierController::class, 'edit'])->name('product.edit');

        Route::post('/{supplier}/product/store', [ProductSupplierController::class, 'store'])->name('product.store');

        Route::delete('/{supplier}/product/{product}/delete', [ProductSupplierController::class, 'destroy'])->name('product.delete');
    });
});