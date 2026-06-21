<x-app-layout>

<!-- Contenedor principal con fondo degradado -->
<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center pt-16">

    <!-- Tarjeta del formulario -->
    <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl 
                w-full max-w-md text-white shadow-lg">

        <!-- Título -->
        <h2 class="text-2xl font-bold mb-6">
            Editar Cliente
        </h2>

        <!-- Formulario para actualizar cliente -->
        <form method="POST" action="{{ route('clientes.update', $cliente) }}">
            @csrf <!-- Token de seguridad -->
            @method('PUT') <!-- Método HTTP para actualización -->

            <!-- Campo de entrada -->
            <div class="mb-4">
                <label class="text-sm text-white/80">
                    Nombre del cliente
                </label>

                <!-- Input con valor actual del cliente -->
                <input type="text" name="nombre"
                       value="{{ $cliente->nombre }}"
                       class="w-full mt-1 p-3 rounded-lg 
                              bg-white/20 text-white placeholder-white/70
                              outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- Botones -->
            <div class="flex gap-3">

                <!-- Botón para actualizar -->
                <button class="w-full bg-blue-500 hover:bg-blue-600 
                               py-2 rounded-lg font-bold">
                    Actualizar
                </button>

                <!-- Botón para volver -->
                <a href="{{ route('clientes.index') }}"
                   class="w-full text-center bg-gray-500 hover:bg-gray-600 
                          py-2 rounded-lg font-bold">
                    Volver
                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>