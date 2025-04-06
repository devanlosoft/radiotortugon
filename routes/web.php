<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\WebRadioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔁 ESTA es la ruta principal que carga imágenes desde el controlador
Route::get('/', [WebRadioController::class, 'index']);

// 🖼 Rutas para subir imágenes
Route::get('/upload-image', [ImageUploadController::class, 'create'])->name('image.upload');
Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('image.upload.post');
