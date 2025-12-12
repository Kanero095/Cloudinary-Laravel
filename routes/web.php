<?php

use App\Http\Controllers\CloudinaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cloudinary Routes Upload Image
route::get('/upload-image', [CloudinaryController::class, 'uploadImage'])->name('upload.image');
route::post('/store-image', [CloudinaryController::class, 'storeImage'])->name('store.image');

// Cloudinary Routes Upload PDF
route::get('/upload-pdf', [CloudinaryController::class, 'uploadpdf'])->name('upload.pdf');
route::post('/store-pdf', [CloudinaryController::class, 'storepdf'])->name('store.pdf');

// Route to check Cloudinary configuration
Route::get('/check-cloud', function () {
    return config('cloudinary.cloud_url');
});
