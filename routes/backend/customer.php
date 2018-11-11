<?php

use App\Http\Controllers\Backend\Customer\CustomerController;
use App\Http\Controllers\Backend\Branch\BranchController;

/*
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'prefix'     => 'customer',
    'namespace'  => 'Customer',
], function () {

    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::get('/{customer}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');

    Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');

    Route::delete('/{customer}/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');

    Route::group([
        'namespace' =>  'Branch'
    ], function () {

        Route::get('/branches', [BranchController::class, 'index'])->name('customer.branch.index');
        Route::get('/{customer}/branch/{branch}', [BranchController::class, 'show'])->name('customer.branch.show');
        Route::get('/{customer}/branch/{branch}/edit', [BranchController::class, 'edit'])->name('customer.branch.edit');
        Route::get('/{customer}/branch/{branch}/deliver', [BranchController::class, 'deliver'])->name('customer.branch.deliver');
        Route::get('/{customer}/branch/{branch}/product/assign_pricing', [BranchController::class, 'assign_product_pricing'])->name('customer.branch.product.assign_product_pricing');

        Route::post('/{customer}/branch/store', [BranchController::class, 'store'])->name('customer.branch.store');

        Route::delete('/{customer}/branch/{branch}/delete', [BranchController::class, 'destroy'])->name('customer.branch.delete');
    });
});