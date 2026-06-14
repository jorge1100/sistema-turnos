<x-app-layout>

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            py-10 px-4">

    <!-- ✅ CONTENEDOR CENTRADO -->
    <div class="max-w-5xl mx-auto">

        <!-- TITULO -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 text-white gap-3">
            <h1 class="text-3xl font-bold">Cajas</h1>

            <a href="{{ route('cajas.create') }}"
               class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg text-white font-bold w-full sm:w-auto text-center">
                + Nueva
            </a>
        </div>

        <!-- TABLA -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">

            <div class="overflow-x-auto">

                <table class="w-full text-white text-sm sm:text-base">

                    <thead class="border-b border-white/30">
                        <tr>
                            <th class="p-3 text-left">ID</th>
                            <th class="p-3 text-left">Nombre</th>
                            <th class="p-3 text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($cajas as $caja)

                        <tr class="border-b border-white/20 hover:bg-white/10">

                            <td class="p-3">{{ $caja->id }}</td>

                            <td class="p-3">{{ $caja->nombre }}</td>

                            <td class="p-3">
                                <div class="flex flex-col sm:flex-row gap-2 justify-center">

                                    <!-- EDITAR -->
                                    <a href="{{ route('cajas.edit', $caja) }}"
                                       class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded text-white text-center">
                                        Editar
                                    </a>

                                    <!-- ELIMINAR -->
                                    <form action="{{ route('cajas.destroy', $caja) }}"
                                          method="POST"
                                          onsubmit="return confirm('⚠️ ¿Eliminar caja?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white w-full">
                                            Eliminar
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-white/70">
                                No hay cajas registradas
                            </td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</x-app-layout>