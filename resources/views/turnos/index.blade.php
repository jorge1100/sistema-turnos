<x-app-layout>
<!-- Layout principal de Laravel -->

<div class="min-h-screen
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700
            py-10 px-4">
    <!-- 
        Contenedor principal:
        altura completa + fondo degradado + padding
    -->

    <div class="max-w-6xl mx-auto">
        <!-- Contenedor centrado -->

        <!-- TITULO -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 text-white gap-3">
            <!-- Flex responsive para título y botón -->

            <h1 class="text-3xl font-bold">Turnos</h1>
            <!-- Título -->

            <a href="{{ route('turnos.create') }}"
               class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg font-bold text-white">
                + Nuevo
            </a>
            <!-- Botón crear turno -->

        </div>

        <!-- TABLA -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
            <!-- Contenedor visual tipo glass -->

            <div class="overflow-x-auto">
                <!-- Permite scroll horizontal -->

                <table class="w-full text-white text-sm sm:text-base">
                    <!-- Tabla -->

                    <thead class="border-b border-white/30">
                        <!-- Encabezado -->

                        <tr>
                            <th class="p-3 text-center">N°</th>
                            <!-- Número -->

                            <th class="p-3 text-left">Cliente</th>
                            <!-- Cliente -->

                            <th class="p-3 text-left">Caja</th>
                            <!-- Caja -->

                            <th class="p-3 text-center">Estado</th>
                            <!-- Estado -->

                            <th class="p-3 text-center">Acciones</th>
                            <!-- Acciones -->
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($turnos as $turno)
                    <!-- Recorre los turnos -->

                        <tr class="border-b border-white/20 hover:bg-white/10">
                            <!-- Fila -->

                            <td class="p-3 text-center font-bold">
                                {{ $turno->numero }}
                            </td>
                            <!-- Número de turno -->

                            <td class="p-3">
                                {{ $turno->cliente->nombre }}
                            </td>
                            <!-- Nombre cliente -->

                            <td class="p-3">
                                {{ $turno->caja->nombre }}
                            </td>
                            <!-- Nombre caja -->

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
                                <!-- Estado con color -->

                            </td>

                            <td class="p-3">

                                <div class="flex flex-col sm:flex-row gap-2 justify-center">
                                    <!-- Botones -->

                                    @if($turno->estado == 'esperando')
                                    <form action="{{ route('turnos.atender',$turno) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <!-- Cambia a atendiendo -->

                                        <button class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded text-white w-full">
                                            Atender
                                        </button>
                                    </form>
                                    @endif

                                    @if($turno->estado == 'atendiendo')
                                    <form action="{{ route('turnos.finalizar',$turno) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <!-- Cambia a finalizado -->

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
                                        <!-- Elimina el turno -->

                                        <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white w-full">
                                            Eliminar
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty
                    <!-- Si no hay datos -->

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
<!-- Fin -->