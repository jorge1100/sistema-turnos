<x-app-layout>

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center pt-16">

    <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl 
                w-full max-w-md text-white shadow-lg">

        <!-- TITULO -->
        <h2 class="text-2xl font-bold mb-6">
            Nuevo Cliente
        </h2>

        <!-- FORM -->
        <form method="POST" action="{{ route('clientes.store') }}">
            @csrf

            <!-- INPUT -->
            <div class="mb-4">
                <label class="text-sm text-white/80">
                    Nombre del cliente
                </label>

                <input type="text" name="nombre"
                       placeholder="Ej: María López"
                       class="w-full mt-1 p-3 rounded-lg 
                              bg-white/20 text-white placeholder-white/70
                              outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <!-- BOTONES -->
            <div class="flex gap-3">

                <!-- GUARDAR -->
                <button class="w-full bg-blue-500 hover:bg-blue-600 
                               py-2 rounded-lg font-bold text-white">
                    Guardar
                </button>

                <!-- VOLVER -->
                <a href="{{ route('clientes.index') }}"
                   class="w-full text-center bg-gray-500 hover:bg-gray-600 
                          py-2 rounded-lg font-bold text-white">
                    Volver
                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>