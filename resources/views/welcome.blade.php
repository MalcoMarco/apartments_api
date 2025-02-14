<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Disponibilidad Saiko</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css'])
    <style>
        section {
          height: 100vh; /* Ocupa toda la altura de la pantalla */
          scroll-snap-align: start; /* Alinea el inicio de cada sección */
        }
        html {
          scroll-snap-type: y mandatory; /* Scroll snap en el eje Y */
        }
        body {
          margin: 0;
          overflow-y: scroll;
        }
      </style>
</head>

<body class="antialiased">
    <div class="w-full min-h-screen bg-gradient-to-r from-blue-900 to-indigo-700 text-white">
        <section class="w-full h-screen flex flex-col justify-center items-center py-6 sm:p-8 sm:rounded-lg">
            <div><img src="/images/logo.png" alt="" class="w-full max-w-xs sm:max-w-56 md:max-w-64 lg:max-w-lg"></div>
            <h1 class="text-center text-lg sm:text-xl lg:text-2xl mt-4">Explorando el Espacio: Disponibilidad y
                Distribución.</h1>
        </section>

        <!-- Disponibilidad y Distribución -->
        <section class="w-full min-h-screen text-left">
            <div class="max-w-4xl mx-auto p-6 sm:p-8">
                <h2 class="text-xl md:text-4xl font-bold">Explorando el Espacio: Disponibilidad y Distribución</h2>
                <div class="text-lg md:text-2xl mt-4">
                    <p class="mt-4">La distribución de los locales en el plano sigue un sistema de identificación estructurado,
                        permitiendo una gestión clara y eficiente del centro de negocios.</p>
                    <ul class="list-disc list-inside mt-4 space-y-2">
                        <li><strong>Local o Terraza:</strong> Indicado por la letra T o L.</li>
                        <li><strong>Piso:</strong> Indicado por el número.</li>
                        <li><strong>Coordenada:</strong> Orientación dentro del plano (Norte, Este, Sur, Oeste).</li>
                        <li><strong>Número de local:</strong> Identificación secuencial.</li>
                    </ul>
                </div>
                <h3 class="text-2xl font-bold mt-6">Ejemplo:</h3>
                <div class="p-6 text-center font-bold text-3xl mt-4">
                    <img src="/images/welcome/ejemplo.png" alt="">
                </div>
            </div>
        </section>

        <!-- Inversión por Nivel -->
        <section class="w-full min-h-screen text-center">
            <div class="flex justify-center flex-col h-full">
                <h1 class="text-4xl font-bold">Inversión por Nivel</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 px-4 lg:px-8 text-sm md:text-2xl">
                    <div class="bg-white text-black p-6 rounded-lg shadow-md ">
                        <h2 class="font-bold">Primer Nivel:</h2>
                        <p>Área disponible: 1,447 m²</p>
                        <p>Precio por m²: $3,800 USD</p>
                    </div>
                    <div class="bg-white text-black p-6 rounded-lg shadow-md">
                        <h2 class="font-bold">Segundo Nivel:</h2>
                        <p>Área disponible: 1,790.5 m²</p>
                        <p>Precio por m²: $2,800 USD</p>
                    </div>
                    <div class="bg-white text-black p-6 rounded-lg shadow-md">
                        <h2 class="font-bold">Tercer Nivel:</h2>
                        <p>Área disponible: 1,769.53 m²</p>
                        <p>Precio por m²: $2,800 USD</p>
                    </div>
                    <div class="bg-white text-black p-6 rounded-lg shadow-md">
                        <h2 class="font-bold">Cuarto Nivel:</h2>
                        <p>Área disponible: 2,008.63 m²</p>
                        <p>Precio por m²: $2,800 USD</p>
                    </div>
                    <div class="bg-white text-black p-6 rounded-lg shadow-md">
                        <h2 class="font-bold">Quinto Nivel:</h2>
                        <p>Área disponible: 1,118 m²</p>
                        <p>Precio por m²: $3,200 USD</p>
                    </div>
                    <div class="bg-white text-black p-6 rounded-lg shadow-md">
                        <h2 class="font-bold">Rooftop:</h2>
                        <p>Área disponible: 1,260.17 m²</p>
                        <p>Precio por m²: $2,000 USD</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nivel 01 -->
        <section class="w-full h-screen text-center">
            <img src="/images/welcome/nivel_1.jpg" class="w-full h-full object-contain" alt="">
        </section>
        {{-- Nivel 02 --}}
        <section class="w-full h-screen text-center">
            <img src="/images/welcome/nivel_2.jpg" class="w-full h-full object-contain" alt="">
        </section>
        {{-- Nivel 03 --}}
        <section class="w-full h-screen text-center">
            <img src="/images/welcome/nivel_3.jpg" class="w-full h-full object-contain" alt="">
        </section>
        {{-- Nivel 04 --}}
        <section class="w-full h-screen text-center">
            <img src="/images/welcome/nivel_4.jpg" class="w-full h-full object-contain" alt="">
        </section>
        {{-- sotea --}}
        <section class="w-full h-screen text-center">
            <img src="/images/welcome/sotea_.jpg" class="w-full h-full object-contain" alt="">
        </section>

        <section class="w-full h-screen flex flex-col justify-center items-center py-6 sm:p-8 sm:rounded-lg">
            <div><img src="/images/logo.png" alt="" class="w-full max-w-xs sm:max-w-56 md:max-w-64 lg:max-w-lg"></div>
            <h1 class="text-center text-lg sm:text-xl lg:text-2xl mt-4">Explorando el Espacio: Disponibilidad y
                Distribución.</h1>
        </section>
    </div>
    <script>
        document.addEventListener('wheel', function(event) {
          const sections = document.querySelectorAll('section');
          let currentSection = Math.round(window.scrollY / window.innerHeight);
          if (event.deltaY > 0) {
            if (window.scrollY >= (currentSection + 0.5) * window.innerHeight) {
              window.scrollBy({
                top: window.innerHeight,
                behavior: 'smooth'
              });
            }
          } else {
            if (window.scrollY <= (currentSection - 0.5) * window.innerHeight) {
              window.scrollBy({
                top: -window.innerHeight,
                behavior: 'smooth'
              });
            }
          }
        });
      </script>
</body>

</html>