<x-app-layout>
<!-- 
    Componente Blade principal de Laravel.
    Todo lo que está dentro se renderiza dentro del layout definido en x-app-layout.
-->

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center py-10 px-4">
    <!-- 
        min-h-screen → altura mínima pantalla completa
        bg-gradient → fondo con degradado (rosa, violeta, azul)
        flex → usa flexbox
        items-start → alinea contenido arriba
        justify-center → centra horizontalmente
        py-10 px-4 → padding vertical y horizontal
    -->

    <div class="max-w-6xl w-full text-white">
        <!-- Contenedor centrado con ancho máximo y texto blanco -->

        <h1 class="text-3xl font-bold mb-8 text-center">
            Nuestro Equipo
        </h1>
        <!-- Título principal -->

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- 
                Grid responsive:
                1 columna en móvil
                3 columnas en pantallas medianas en adelante
                gap-6 → espacio entre tarjetas
            -->

            <!-- ✅ JORGE -->
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl text-center">
                <!-- 
                    Tarjeta con fondo translúcido
                    backdrop-blur → efecto vidrio
                    padding y bordes redondeados
                -->

                <h2 class="text-xl font-bold">Jorge Luis Rojas Jojot</h2>
                <!-- Nombre -->

                <p class="text-white/70 mb-4">Desarrollador Full Stack</p>
                <!-- Rol -->

                <a href="{{ route('cv.jorge') }}" target="_blank"
                   class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded text-white font-bold w-full block">
                    Ver Curriculum
                </a>
                <!-- Botón que abre el CV en otra pestaña -->

            </div>

            <!-- ✅ JONATHAN -->
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl text-center">

                <h2 class="text-xl font-bold">Jonathan</h2>

                <p class="text-white/70 mb-4">Desarrollador</p>

                <a href="{{ route('cv.jonathan') }}" target="_blank"
                   class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded text-white font-bold w-full block">
                    Ver Curriculum
                </a>

            </div>

            <!-- ✅ CRISTIAN -->
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl text-center">

                <h2 class="text-xl font-bold">Cristian</h2>

                <p class="text-white/70 mb-4">Desarrollador</p>

                <a href="{{ route('cv.cristian') }}" target="_blank"
                   class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded text-white font-bold w-full block">
                    Ver Curriculum
                </a>

            </div>

        </div>

    </div>

</div>

</x-app-layout>
<!-- Cierra el layout principal -->