<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subir Imagen - {{ config('app.name', 'Laravel') }}</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .alert {
            margin-top: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 8px;
        }

        label, input, button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h1>Subir Nueva Imagen</h1>

{{-- Mostrar mensaje de éxito si existe --}}
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
    {{-- Mostrar la imagen subida y su URL si existen --}}
    @if (session('imageUrl'))
    <p>URL Pública: <a href="{{ session('imageUrl') }}" target="_blank">{{ session('imageUrl') }}</a></p>
    <img src="{{ session('imageUrl') }}" alt="Imagen subida">
    @endif
</div>
@endif

{{-- Mostrar errores de validación si existen --}}
@if ($errors->any())
<div class="alert alert-danger">
    <strong>¡Ups! Hubo algunos problemas:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- El formulario de subida --}}
{{-- La acción apunta a la ruta POST que definimos, usando su nombre --}}
<form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
    @csrf {{-- Token CSRF OBLIGATORIO para seguridad --}}

    <div>
        <label for="image">Selecciona una imagen:</label>
        {{-- El 'name="image"' debe coincidir con el que usaremos en el controlador --}}
        <input type="file" name="image" id="image" required accept="image/*">
        {{-- 'accept="image/*"' ayuda al navegador a filtrar solo archivos de imagen --}}
    </div>

    <button type="submit">Subir Imagen</button>
</form>

</body>
</html>
