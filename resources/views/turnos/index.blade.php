<x-app-layout>

<div class="min-h-screen
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700
            py-10 px-4">

    <div class="max-w-6xl mx-auto">

        <!-- TITULO -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 text-white gap-3">

            <h1 class="text-3xl font-bold">Turnos</h1>

            <a href="{{ route('turnos.create') }}"
               class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg font-bold text-white">
                + Nuevo
            </a>

        </div>

        <!-- TABLA -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">

            <div class="overflow-x-auto">

                <table class="w-full text-white text-sm sm:text-base">

                    <thead class="border-b border-white/30">
                        <tr>
                            <th class="p-3 text-center">N°</th>
                            <th class="p-3 text-left">Cliente</th>
                            <th class="p-3 text-left">Caja</th>
                            <th class="p-3 text-center">Estado</th>
                            <th class="p-3 text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($turnos as $turno)

                        <tr class="border-b border-white/20 hover:bg-white/10">

                            <td class="p-3 text-center font-bold">
                                {{ $turno->numero }}
                            </td>

                            <td class="p-3">
                                {{ $turno->cliente->nombre }}
                            </td>

                            <td class="p-3">
                                {{ $turno->caja->nombre }}
                            </td>

                            <td class="p-3 text-center">

                                @if($turno->estado == 'esperando')
                                    <span class="bg-yellow-500 px-3 py-1 rounded text-white text-sm">
                                        Esperando
                                    </span>

                                @elseif($turno->estado == 'atendiendo')
                                    <span class="bg-blue-500 px-3 py-1 rounded text-white text-sm">
                                        En atención
                                    </span>

                                @else
                                    <span class="bg-green-500 px-3 py-1 rounded text-white text-sm">
                                        Finalizado
                                    </span>
                                @endif

                            </td>

                            <td class="p-3">

                                <div class="flex flex-col sm:flex-row gap-2 justify-center">

                                    @if($turno->estado == 'esperando')
                                    <form action="{{ route('turnos.atender',$turno) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded text-white w-full">
                                            Atender
                                        </button>
                                    </form>
                                    @endif

                                    @if($turno->estado == 'atendiendo')
                                    <form action="{{ route('turnos.finalizar',$turno) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-white w-full">
                                            Finalizar
                                        </button>
                                    </form>
                                    @endif

                                    <form action="{{ route('turnos.destroy',$turno) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Seguro eliminar el turno?')">
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
                            <td colspan="5"
                                class="text-center py-4 text-white/70">
                                No hay turnos registrados
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