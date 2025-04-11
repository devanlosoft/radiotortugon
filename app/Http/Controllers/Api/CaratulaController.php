<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Caratula;
use Illuminate\Http\JsonResponse; // Para tipar la respuesta

class CaratulaController extends Controller
{
    /**
     * Muestra una lista de items con solo título y ruta de imagen.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {

        $items = Caratula::select('id', 'caratula_url')->get();
        $formattedItems = $items->map(function (Caratula $item) {
            return [
                'id' => $item->id,
                'caratula_url' => $item->caratula_url

            ];
        });

        return response()->json($formattedItems);


    }
}
