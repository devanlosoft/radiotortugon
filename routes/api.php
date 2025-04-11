<?php // Asegúrate que el archivo comience con esto si está vacío

use App\Http\Controllers\Api\CaratulaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// 1. Importa tu controlador al principio del archivo
use App\Http\Controllers\ImageUploadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Ruta de ejemplo que viene con Laravel (puedes dejarla o quitarla)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// --- NUESTRA RUTA API PARA SUBIR IMAGEN ---

// 2. Ruta para PROCESAR la subida de la imagen vía API (Método POST)
// Cuando se haga una petition POST a tu-dominio.com/api/upload-image,
// se ejecutará el método 'storeApi' del ImageUploadController.
// Nota: No usamos ->name() aquí, aunque podríamos si quisiéramos.
Route::post('/upload-image', [ImageUploadController::class, 'storeApi']);



// Ruta para obtener todas las imágenes
Route::get('/images', [ImageUploadController::class, 'index']);

// Ruta para obtener todas las caratulas
Route::get('/caratulas', [CaratulaController::class, 'index']);

// Puedes añadir otras rutas aquí...
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// --- FIN DE NUESTRA RUTA API ---
