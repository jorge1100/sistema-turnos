<x-app-layout>

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center pt-16">

    <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl 
                w-full max-w-md text-white shadow-lg">

        <h2 class="text-2xl font-bold mb-6">
            Editar Caja
        </h2>

        <form method="POST" action="{{ route('cajas.update', $caja) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="text-white/80 text-sm">
                    Nombre de la caja
                </label>

                <input type="text" name="nombre"
                       value="{{ $caja->nombre }}"
                       class="w-full mt-1 p-3 rounded-lg bg-white/20 text-white 
                              outline-none focus:ring-2 focus:ring-pink-400">
            </div>

            <div class="flex gap-3">

                <button class="w-full bg-blue-500 hover:bg-blue-600 py-2 rounded text-white font-bold">
                    Actualizar
                </button>

                <a href="{{ route('cajas.index') }}"
                   class="w-full text-center bg-gray-500 hover:bg-gray-600 py-2 rounded text-white font-bold">
                    Volver
                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>