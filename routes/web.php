<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


// Category Resource Route
Route::resource('category', CategoryController::class);