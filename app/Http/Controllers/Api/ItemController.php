<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
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

        $items = Image::select('id', 'title', 'image_path')->get();
        $formattedItems = $items->map(function ($item) {
            return [
                'title' => $item->title,
                'imagePath' => $item->image_path // Mapeamos image_path a imagePath

            ];
        });

        return response()->json($formattedItems);


    }
}
