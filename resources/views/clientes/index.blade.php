<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 py-10 px-4">

    <div class="max-w-6xl mx-auto">

        <!-- TITULO -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 text-white gap-3">

            <h1 class="text-3xl font-bold">
                Clientes
            </h1>

            <a href="{{ route('clientes.create') }}"
               class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg font-bold text-white w-full sm:w-auto text-center">
                + Nuevo
            </a>

        </div>

        <!-- BUSCADOR -->
        <form action="{{ route('clientes.index') }}"
              method="GET"
              class="mb-6 flex flex-col sm:flex-row gap-3">

            <input
                type="text"
                name="buscar"
                value="{{ request('buscar') }}"
                placeholder="Buscar cliente..."
                autocomplete="off"
                class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-white/60 outline-none focus:ring-2 focus:ring-pink-400">

            <button
                type="submit"
                class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg text-white font-bold">
                Buscar
            </button>

            <a href="{{ route('clientes.index') }}"
               class="bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-lg text-white font-bold text-center">
                Limpiar
            </a>

        </form>

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

                        @forelse($clientes as $cliente)

                            <tr class="border-b border-white/20 hover:bg-white/10">

                                <td class="p-3">
                                    {{ $cliente->id }}
                                </td>

                                <td class="p-3">
                                    {{ $cliente->nombre }}
                                </td>

                                <td class="p-3">

                                    <div class="flex flex-col sm:flex-row gap-2 justify-center items-center">

                                        <a href="{{ route('clientes.edit', $cliente) }}"
                                           class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded text-white w-full sm:w-auto text-center">
                                            Editar
                                        </a>

                                        <form action="{{ route('clientes.destroy', $cliente) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Seguro eliminar este cliente?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white w-full sm:w-auto">
                                                Eliminar
                                            </button>

                                        </form>

                                        <a href="{{ route('turnos.create.fromCliente', $cliente->id) }}"
                                           class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-white w-full sm:w-auto text-center">
                                            Dar Turno
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="3" class="text-center py-6 text-white/70">
                                    No se encontraron clientes
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