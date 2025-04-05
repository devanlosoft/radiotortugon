<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\Image; // Importa el modelo Image

class ImageUploadController extends Controller
{
    public function create(): View
    {
        return view('upload');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'image.required' => 'Debes seleccionar un archivo de imagen.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'La imagen no debe pesar más de 2MB.',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $url = 'http://localhost:8000/storage/' . $path;

            // Guardar la URL en la base de datos
            Image::create(['file_path' => $path, 'url' => $url]);

            return back()
                ->with('success', '¡Imagen subida correctamente!')
                ->with('imageUrl', $url);
        } else {
            return back()->withErrors(['image' => 'Hubo un problema al subir el archivo o no se seleccionó uno.']);
        }
    }

    public function storeApi(Request $request): JsonResponse
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            try {
                $file = $request->file('image');
                $path = $file->store('images', 'public');
                $url = 'http://localhost:8000/storage/' . $path;

                // Guardar la URL en la base de datos
                Image::create(['file_path' => $path, 'url' => $url]);

                return response()->json([
                    'success' => true,
                    'message' => 'Imagen subida correctamente!',
                    'imageUrl' => $url,
                    'path' => $path
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al guardar la imagen: ' . $e->getMessage(),
                ], 500);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró un archivo de imagen válido en la petición.',
            ], 400);
        }
    }

    /**
     * Obtiene todas las imágenes de la base de datos y las devuelve en formato JSON.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        // Obtener todas las imágenes de la base de datos
        $images = Image::all();

        // Devolver las imágenes en formato JSON
        return response()->json($images);
    }
}
