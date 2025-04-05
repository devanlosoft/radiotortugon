<?php // Asegúrate que el archivo comience con esto si está vacío

use Illuminate\Support\Facades\Route;
// 1. Importa tu controlador al principio del archivo
use App\Http\Controllers\ImageUploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome'); // Esta es la ruta de bienvenida por defecto
});

// --- NUESTRAS RUTAS PARA SUBIR IMAGEN ---

// 2. Ruta para MOSTRAR el formulario de subida (Método GET)
// Cuando alguien visite tu-dominio.com/upload-image en su navegador,
// se ejecutará el método 'create' del ImageUploadController.
// Le damos un nombre 'image.upload' para referenciarla fácilmente.
Route::get('/upload-image', [ImageUploadController::class, 'create'])->name('image.upload');

// 3. Ruta para PROCESAR la subida de la imagen (Método POST)
// Cuando el formulario se envíe (usando el método POST) a tu-dominio.com/upload-image,
// se ejecutará el método 'store' del ImageUploadController.
// Le damos el nombre 'image.upload.post'.
Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('image.upload.post');

// --- FIN DE NUESTRAS RUTAS ---
