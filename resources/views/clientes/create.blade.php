<x-app-layout>
<!-- Layout principal de la aplicación (solo usuarios autenticados) -->

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center pt-16">
<!-- 
Contenedor principal:
- min-h-screen → ocupa toda la altura de la pantalla
- bg-gradient → fondo degradado (estilo visual)
- flex → habilita flexbox
- justify-center → centra el contenido horizontalmente
- items-start → lo alinea hacia arriba (no vertical centro)
- pt-16 → agrega espacio arriba
-->

    <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl 
                w-full max-w-md text-white shadow-lg">
    <!-- 
    Card (contenedor del formulario):
    - bg-white/10 → fondo semitransparente
    - backdrop-blur → efecto vidrio
    - p-8 → padding interno
    - rounded-xl → bordes redondeados
    - max-w-md → limita el ancho
    - text-white → texto blanco
    - shadow-lg → sombra
    -->

        <!-- TITULO -->
        <h2 class="text-2xl font-bold mb-6">
            Nuevo Cliente
        </h2>
        <!-- Encabezado de la vista -->

        <!-- FORM -->
        <form method="POST" action="{{ route('clientes.store') }}">
        <!-- 
        Formulario:
        - method POST → envía datos al servidor
        - route('clientes.store') → ruta que guarda el cliente en la base de datos
        -->

            @csrf
            <!-- Token de seguridad obligatorio en Laravel (CSRF) -->

            <!-- INPUT -->
            <div class="mb-4">
                <label class="text-sm text-white/80">
                    Nombre del cliente
                </label>
                <!-- Etiqueta del campo -->

                <input type="text" name="nombre"
                       placeholder="Ej: María López"
                       class="w-full mt-1 p-3 rounded-lg 
                              bg-white/20 text-white placeholder-white/70
                              outline-none focus:ring-2 focus:ring-pink-400">
                <!-- 
                Input:
                - name="nombre" → nombre del campo enviado al backend
                - placeholder → ejemplo para el usuario
                - estilos → apariencia visual con Tailwind CSS
                -->
            </div>

            <!-- BOTONES -->
            <div class="flex gap-3">
            <!-- Contenedor con flexbox para los botones -->

                <!-- GUARDAR -->
                <button class="w-full bg-blue-500 hover:bg-blue-600 
                               py-2 rounded-lg font-bold text-white">
                    Guardar
                </button>
                <!-- 
                Botón de envío:
                - envía el formulario
                - crea el cliente en la base de datos
                -->

                <!-- VOLVER -->
                <a href="{{ route('clientes.index') }}"
                   class="w-full text-center bg-gray-500 hover:bg-gray-600 
                          py-2 rounded-lg font-bold text-white">
                    Volver
                </a>
                <!-- 
                Enlace:
                - lleva al listado de clientes
                - no envía datos, solo redirecciona
                -->

            </div>

        </form>

    </div>

</div>

</x-app-layout>