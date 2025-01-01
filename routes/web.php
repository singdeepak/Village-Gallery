<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;


Route::get('/', [GalleryController::class, 'showPhotos'])->name('show.gallery');


require __DIR__ .'/admin.php';