<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Item; // Importa el modelo Item
use Illuminate\Http\JsonResponse; // Para tipar la respuesta

class ItemController extends Controller
{
    /**
     * Muestra una lista de items con solo título y ruta de imagen.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        // 1. Obtener los items de la base de datos
        // Seleccionamos solo las columnas necesarias para optimizar la consulta
        $items = Image::select('id', 'title', 'image_path')->get();

        // 2. Transformar los datos al formato deseado
        // Usamos map para iterar sobre cada item y crear un nuevo array
        // con la estructura requerida.
        $formattedItems = $items->map(function ($item) {
            return [
                'title' => $item->title,
                'imagePath' => $item->image_path // Mapeamos image_path a imagePath
                // Si necesitas la URL completa, puedes usar asset() o Storage::url()
                // 'imagePath' => asset('storage/' . $item->image_path) // Ejemplo si usas public disk
                // 'imagePath' => \Illuminate\Support\Facades\Storage::disk('s3')->url($item->image_path) // Ejemplo con S3
            ];
        });

        // 3. Devolver la respuesta JSON
        return response()->json($formattedItems);

        /* Alternativa usando API Resources (más avanzado, ideal para APIs complejas):
           // 1. Crea un Resource: php artisan make:resource ItemResource
           // 2. Edita ItemResource:
           //    public function toArray($request) {
           //        return [
           //            'title' => $this->title,
           //            'imagePath' => $this->image_path,
           //        ];
           //    }
           // 3. Úsalo en el controlador:
           //    $items = Item::select('id', 'title', 'image_path')->get();
           //    return \App\Http\Resources\ItemResource::collection($items);
        */
    }
}
