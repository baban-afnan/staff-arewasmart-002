<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\UserManagementController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Bvn report upload
Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::post('/enrollments/upload', [EnrollmentController::class, 'upload'])->name('enrollments.upload');

Route::get('/enrollments/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollments.show');

// vtpass variations refresh
Route::get('/refresh-variations', [VariationController::class, 'refresh'])->name('variations.refresh');



    Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('services', ServiceController::class);
    
    // Field Routes
    Route::post('services/{service}/fields', [ServiceController::class, 'storeField'])->name('services.fields.store');
    Route::put('service-fields/{field}', [ServiceController::class, 'updateField'])->name('services.fields.update');
    Route::delete('service-fields/{field}', [ServiceController::class, 'destroyField'])->name('services.fields.destroy');

    // Price Routes
    Route::post('services/{service}/prices', [ServiceController::class, 'storePrice'])->name('services.prices.store');
    Route::put('service-prices/{price}', [ServiceController::class, 'updatePrice'])->name('services.prices.update');
    Route::delete('service-prices/{price}', [ServiceController::class, 'destroyPrice'])->name('services.prices.destroy');

    // User Management Routes
    Route::prefix('admin/users')->name('admin.users.')->group(function () {
        Route::get('/', [UserManagementController::class, 'index'])->name('index');
        Route::post('/', [UserManagementController::class, 'store'])->name('store');
        Route::post('/block-ip', [UserManagementController::class, 'blockIp'])->name('block-ip');
        Route::delete('/unblock-ip/{blockedIp}', [UserManagementController::class, 'unblockIp'])->name('unblock-ip');
        Route::get('/download-sample', [UserManagementController::class, 'downloadSample'])->name('download-sample');
        Route::post('/import', [UserManagementController::class, 'import'])->name('import');
        Route::get('/{user}', [UserManagementController::class, 'show'])->name('show');
        Route::get('/{user}/edit', [UserManagementController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserManagementController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserManagementController::class, 'destroy'])->name('destroy');
        Route::patch('/{user}/status', [UserManagementController::class, 'updateStatus'])->name('update-status');
        Route::patch('/{user}/role', [UserManagementController::class, 'updateRole'])->name('update-role');
        Route::patch('/{user}/limit', [UserManagementController::class, 'updateLimit'])->name('update-limit');
    });
});

require __DIR__.'/auth.php';
