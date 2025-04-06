<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Radio Viva Verde</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/a2e00e8df9.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gradient-to-br from-green-700 to-green-300 text-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-green-900 bg-opacity-90 py-4 px-6 flex justify-between items-center shadow-md sticky top-0 z-50">
        <div class="text-2xl font-bold">Radio Tortugon</div>
        <ul class="flex space-x-6 text-sm md:text-base">
            <li><a href="#home" class="hover:text-green-200">Inicio</a></li>
            <li><a href="#programas" class="hover:text-green-200">Programación</a></li>
            <li><a href="#equipo" class="hover:text-green-200">Equipo</a></li>
            <li><a href="#galeria" class="hover:text-green-200">Galería</a></li>
            <li><a href="#contacto" class="hover:text-green-200">Contacto</a></li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="home" class="text-center py-20 px-6 bg-green-800 bg-opacity-70">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-4">🌿 Radio Viva Verde</h1>
        <p class="text-lg md:text-xl">Conectando emociones con música — Transmitiendo en vivo 24/7</p>
        <a href="#live"
            class="mt-6 inline-block bg-green-600 hover:bg-green-500 text-white font-semibold px-8 py-3 rounded-full transition">🎧
            Escúchanos ahora</a>
    </header>

    <!-- Live Player -->
    <section id="live" class="py-16 px-6 flex flex-col md:flex-row items-center justify-center gap-10">
        <div class="w-full md:w-1/2 shadow-2xl rounded-2xl overflow-hidden">
            <audio controls>
                <source src="https://estructuraweb.com.co:9558/live" type="audio/mpeg" allow="autoplay">
            </audio>
        </div>
        <div class="w-full md:w-1/2 space-y-6">
            <div class="bg-white bg-opacity-10 backdrop-blur-md p-6 rounded-xl shadow-xl text-gray-100">
                <h2 class="text-2xl font-semibold mb-2">🎶 Escucha en vivo</h2>
                <p>Disfruta de nuestra programación exclusiva y las mejores canciones seleccionadas para ti.</p>
            </div>
        </div>
    </section>

    <!-- Programación -->
    <section id="programas" class="py-16 px-6 bg-green-800 bg-opacity-60">
        <h2 class="text-3xl font-bold text-center mb-8">📻 Programación</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white bg-opacity-10 p-4 rounded-xl shadow-lg text-gray-100">
                <h3 class="text-xl font-semibold">Mañanas Musicales</h3>
                <p class="text-sm mt-2">Lunes a Viernes - 6AM a 10AM</p>
            </div>
            <div class="bg-white bg-opacity-10 p-4 rounded-xl shadow-lg text-gray-100">
                <h3 class="text-xl font-semibold">Tardes Verdes</h3>
                <p class="text-sm mt-2">Lunes a Viernes - 2PM a 5PM</p>
            </div>
            <div class="bg-white bg-opacity-10 p-4 rounded-xl shadow-lg text-gray-100">
                <h3 class="text-xl font-semibold">Noches Chill</h3>
                <p class="text-sm mt-2">Todos los días - 9PM en adelante</p>
            </div>
        </div>
    </section>

    <!-- Nuestro Equipo -->
    <section id="equipo" class="py-16 px-6">
        <h2 class="text-3xl font-bold text-center mb-10">👩‍🎤 Nuestro Equipo</h2>
        <div class="flex flex-wrap justify-center gap-10">
            <div class="bg-white bg-opacity-10 p-6 rounded-xl shadow-md text-center text-gray-100">
                <img src="/images/dj1.jpg" alt="DJ Luna" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h3 class="text-xl font-bold">DJ Luna</h3>
                <p class="text-sm">Música Ambiental y Chill</p>
            </div>
            <div class="bg-white bg-opacity-10 p-6 rounded-xl shadow-md text-center text-gray-100">
                <img src="/images/dj2.jpg" alt="DJ Sol" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h3 class="text-xl font-bold">DJ Sol</h3>
                <p class="text-sm">Pop Latino y Vibes Tropicales</p>
            </div>
        </div>
    </section>

    <!-- Galería -->
    <section id="galeria" class="py-16 px-6 bg-green-100 text-green-900">
        <h2 class="text-3xl font-bold text-center mb-10">🌄 Galería</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach (array_slice($imagenes, 0, 6) as $img)
                <img src="{{ $img['url'] }}" alt="Galería" class="rounded-xl shadow-md">
            @endforeach
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="py-16 px-6 bg-green-900 bg-opacity-80">
        <h2 class="text-3xl font-bold text-center mb-8">📬 Contáctanos</h2>
        <div class="max-w-xl mx-auto">
            <form class="space-y-6">
                <input type="text" placeholder="Tu nombre"
                    class="w-full p-3 rounded-lg bg-white bg-opacity-10 text-gray-100 placeholder-gray-300 focus:outline-none">
                <input type="email" placeholder="Tu correo"
                    class="w-full p-3 rounded-lg bg-white bg-opacity-10 text-gray-100 placeholder-gray-300 focus:outline-none">
                <textarea rows="4" placeholder="Tu mensaje"
                    class="w-full p-3 rounded-lg bg-white bg-opacity-10 text-gray-100 placeholder-gray-300 focus:outline-none"></textarea>
                <button type="submit"
                    class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-full font-semibold">Enviar</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-950 text-green-200 text-center py-6 text-sm">
        &copy; {{ date('Y') }} Radio Viva Verde. Todos los derechos reservados.
    </footer>
</body>

</html>