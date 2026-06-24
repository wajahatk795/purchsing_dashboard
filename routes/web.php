<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Login Page
|--------------------------------------------------------------------------
*/

Route::redirect('/', 'login');

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | ADMIN ONLY
        |--------------------------------------------------------------------------
        */

        Route::middleware('role:admin')->group(function () {

            // Companies
            Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
            Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
            Route::get('/company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
            Route::put('/company/{company}', [CompanyController::class, 'update'])->name('company.update');
            Route::delete('/company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');

            // Units
            Route::get('/unit/create', [UnitController::class, 'create'])->name('unit.create');
            Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
            Route::get('/unit/{unit}/edit', [UnitController::class, 'edit'])->name('unit.edit');
            Route::put('/unit/{unit}', [UnitController::class, 'update'])->name('unit.update');
            Route::delete('/unit/{unit}', [UnitController::class, 'destroy'])->name('unit.destroy');

            // Users
            Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/user/store', [AuthController::class, 'register'])->name('users.store');
        });

        /*
        |--------------------------------------------------------------------------
        | ADMIN + VIEWER
        |--------------------------------------------------------------------------
        */

        Route::middleware('role:admin,viewer')->group(function () {

            Route::get('/company', [CompanyController::class, 'index'])->name('company');
            Route::get('/company/data', [CompanyController::class, 'getCompanies'])->name('company.data');

            Route::get('/unit', [UnitController::class, 'index'])->name('unit');
            Route::get('/unit/data', [UnitController::class, 'getCompanies'])->name('unit.data');

            Route::get('/user', [UserController::class, 'index'])->name('users');
        });

        /*
        |--------------------------------------------------------------------------
        | ADMIN + VIEWER + EDITOR
        |--------------------------------------------------------------------------
        */

        Route::middleware('role:admin,viewer,editor')->group(function () {

            Route::get('/purchasing', [PurchasingController::class, 'index'])
                ->name('purchasing');

            Route::get('/purchasing/data', [PurchasingController::class, 'getPurchasings'])
                ->name('purchasing.data');

            // Purchasing
            Route::get('/purchasing/create', [PurchasingController::class, 'create'])->name('purchasing.create');
            Route::post('/purchasing/store', [PurchasingController::class, 'store'])->name('purchasing.store');
            Route::get('/purchasing/{purchasing}/edit', [PurchasingController::class, 'edit'])->name('purchasing.edit');
            Route::put('/purchasing/{purchasing}', [PurchasingController::class, 'update'])->name('purchasing.update');
            Route::delete('/purchasing/{purchasing}', [PurchasingController::class, 'destroy'])->name('purchasing.destroy');
        });
    });
