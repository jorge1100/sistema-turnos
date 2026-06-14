<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 p-6 pt-10">

    <!-- TITULO -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 text-white gap-3">

        <h1 class="text-3xl font-bold">Turnos</h1>

        <a href="{{ route('turnos.create') }}"
           class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded text-white font-bold w-full sm:w-auto text-center">
            + Nuevo
        </a>

    </div>

    <!-- TABLA -->
    <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl">

        <div class="overflow-x-auto">

            <table class="w-full text-white text-sm sm:text-base">

                <thead class="border-b border-white/30">
                    <tr>
                        <th class="p-3">N°</th>
                        <th class="p-3 text-left">Cliente</th>
                        <th class="p-3 text-left">Caja</th>
                        <th class="p-3 text-center">Estado</th>
                        <th class="p-3 text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($turnos as $turno)

                    <tr class="border-b border-white/20 hover:bg-white/10">

                        <td class="p-3 font-bold text-center">
                            {{ $turno->numero }}
                        </td>

                        <td class="p-3">
                            {{ $turno->cliente->nombre }}
                        </td>

                        <td class="p-3">
                            {{ $turno->caja->nombre }}
                        </td>

                        <!-- ✅ ESTADO (COLORES ORIGINALES) -->
                        <td class="p-3 text-center">
                            @if($turno->estado == 'esperando')
                                <span class="bg-yellow-500 px-3 py-1 rounded text-white">
                                    Esperando
                                </span>
                            @elseif($turno->estado == 'atendiendo')
                                <span class="bg-blue-500 px-3 py-1 rounded text-white">
                                    En atención
                                </span>
                            @else
                                <span class="bg-green-500 px-3 py-1 rounded text-white">
                                    Finalizado
                                </span>
                            @endif
                        </td>

                        <!-- ✅ BOTONES CENTRADOS -->
                        <td class="p-3">

                            <div class="flex flex-col sm:flex-row gap-2 justify-center items-center">

                                <!-- ATENDER -->
                                @if($turno->estado == 'esperando')
                                <form action="{{ route('turnos.atender',$turno) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded text-white w-full sm:w-auto">
                                        Atender
                                    </button>
                                </form>
                                @endif

                                <!-- FINALIZAR -->
                                @if($turno->estado == 'atendiendo')
                                <form action="{{ route('turnos.finalizar',$turno) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-white w-full sm:w-auto">
                                        Finalizar
                                    </button>
                                </form>
                                @endif

                                <!-- ELIMINAR -->
                                <form action="{{ route('turnos.destroy',$turno) }}" method="POST"
                                      onsubmit="return confirm('⚠️ ¿Eliminar turno?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white w-full sm:w-auto">
                                        Eliminar
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach
                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>