<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;


// Login  Routes
route::middleware(['admin_guest'])->group(function(){
    Route::get('admin', [LoginController::class, 'showLoginPage'])->name('admin.login');
    Route::post('admin-login-check', [LoginController::class, 'checkLoginDetails'])->name('admin.login.check');
});


// Dashboard  Routes
route::middleware(['admin_auth'])->group(function(){
    Route::get('admin-dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin-logout', [DashboardController::class, 'adminLogout'])->name('admin.logout');
});


// Category Resource Routes
Route::resource('category', CategoryController::class);

// Photo Resource Routes
Route::resource('photo', PhotoController::class);
