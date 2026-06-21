<x-app-layout>
<!-- Layout principal de la aplicación (solo para usuarios autenticados) -->

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center pt-16">
<!-- 
Contenedor principal:
- min-h-screen → ocupa toda la altura de la pantalla
- bg-gradient → fondo degradado con colores
- flex → habilita flexbox
- justify-center → centra horizontalmente
- items-start → alinea el contenido arriba
- pt-16 → agrega espacio en la parte superior
-->

    <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl 
                w-full max-w-md text-white shadow-lg">
    <!-- 
    Card contenedora:
    - bg-white/10 → fondo transparente (efecto glass)
    - backdrop-blur-md → efecto desenfoque (vidrio)
    - p-8 → padding interno
    - rounded-xl → bordes redondeados
    - w-full + max-w-md → ancho adaptable con límite
    - text-white → texto blanco
    - shadow-lg → sombra
    -->

        <!-- TITULO -->
        <h2 class="text-2xl font-bold mb-6">
            Editar Caja
        </h2>
        <!-- Título principal de la vista -->

        <!-- FORMULARIO -->
        <form method="POST" action="{{ route('cajas.update', $caja) }}">
        <!-- 
        Formulario:
        - method="POST" → método de envío
        - route('cajas.update', $caja) → ruta para actualizar una caja específica
        -->

            @csrf
            <!-- Protección contra ataques CSRF (obligatorio en Laravel) -->

            @method('PUT')
            <!-- 
            Laravel necesita este método para:
            - simular un PUT (update)
            - HTML solo soporta GET y POST
            -->

            <!-- CAMPO NOMBRE -->
            <div class="mb-4">
                <label class="text-white/80 text-sm">
                    Nombre de la caja
                </label>
                <!-- Etiqueta del campo -->

                <input type="text" name="nombre"
                       value="{{ $caja->nombre }}"
                       class="w-full mt-1 p-3 rounded-lg bg-white/20 text-white 
                              outline-none focus:ring-2 focus:ring-pink-400">
                <!-- 
                Input:
                - name="nombre" → nombre del campo enviado al backend
                - value="{{ $caja->nombre }}" → valor actual de la caja
                - permite editar el nombre existente
                -->
            </div>

            <!-- BOTONES -->
            <div class="flex gap-3">
            <!-- Contenedor de botones con espacio entre ellos -->

                <!-- BOTÓN ACTUALIZAR -->
                <button class="w-full bg-blue-500 hover:bg-blue-600 py-2 rounded text-white font-bold">
                    Actualizar
                </button>
                <!-- Envía el formulario para guardar los cambios -->

                <!-- BOTÓN VOLVER -->
                <a href="{{ route('cajas.index') }}"
                   class="w-full text-center bg-gray-500 hover:bg-gray-600 py-2 rounded text-white font-bold">
                    Volver
                </a>
                <!-- 
                Link:
                - route('cajas.index') → regresa al listado de cajas
                -->

            </div>

        </form>

    </div>

</div>

</x-app-layout>