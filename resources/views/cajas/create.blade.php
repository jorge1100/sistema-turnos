<x-app-layout>
<!-- Layout principal de la aplicación (usuarios autenticados) -->

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center pt-16">
<!-- 
Contenedor general:
- min-h-screen → ocupa toda la pantalla
- bg-gradient → fondo degradado
- flex → permite centrar contenido
- justify-center → centra horizontalmente
- items-start → alinea arriba
- pt-16 → espacio superior
-->

    <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl 
                w-full max-w-md text-white shadow-lg">
    <!-- 
    Card principal:
    - bg-white/10 → fondo semitransparente
    - backdrop-blur → efecto vidrio
    - p-8 → padding interno
    - rounded-xl → bordes redondeados
    - shadow-lg → sombra
    -->

        <!-- TITULO -->
        <h2 class="text-2xl font-bold mb-6">
            Nueva Caja
        </h2>
        <!-- Título de la vista -->

        <!-- FORMULARIO -->
        <form method="POST" action="{{ route('cajas.store') }}">
            <!-- 
            Formulario POST:
            - route('cajas.store') → guarda una nueva caja en la BD
            -->

            @csrf
            <!-- Seguridad contra ataques CSRF -->

            <!-- CAMPO NOMBRE -->
            <div class="mb-4">
                <label class="text-white/80 text-sm">
                    Nombre de la caja
                </label>

                <input type="text" name="nombre"
                       placeholder="Ej: Caja 1"
                       class="w-full mt-1 p-3 rounded-lg bg-white/20 text-white 
                              outline-none focus:ring-2 focus:ring-pink-400"
                       required>
                <!-- 
                Input:
                - name="nombre" → se envía al backend
                - placeholder → ejemplo visual
                - required → obligatorio
                -->
            </div>

            <!-- BOTONES -->
            <div class="flex gap-3">
                <!-- CONTENEDOR FLEX para ambos botones -->

                <!-- BOTÓN GUARDAR -->
                <button class="w-full bg-blue-500 hover:bg-blue-600 py-2 rounded text-white font-bold">
                    Guardar
                </button>
                <!-- Envía el formulario -->

                <!-- BOTÓN VOLVER -->
                <a href="{{ route('cajas.index') }}"
                   class="w-full text-center bg-gray-500 hover:bg-gray-600 py-2 rounded text-white font-bold">
                    Volver
                </a>
                <!-- 
                Link para volver a la lista de cajas
                - route('cajas.index') → listado de cajas
                -->

            </div>

        </form>

    </div>

</div>

</x-app-layout>