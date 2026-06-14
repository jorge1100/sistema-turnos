<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Gestión de Turnos
        </h1>

        <a href="{{ route('turnos.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
            + Nuevo Turno
        </a>

        <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">Turno</th>
                        <th class="p-3">Cliente</th>
                        <th class="p-3">Caja</th>
                        <th class="p-3">Estado</th>
                        <th class="p-3">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($turnos as $turno)
                    <tr class="border-t hover:bg-gray-50">

                        <td class="p-3 font-bold text-indigo-600">
                            #{{ $turno->numero }}
                        </td>

                        <td class="p-3">
                            {{ $turno->cliente->nombre }}
                        </td>

                        <td class="p-3">
                            {{ $turno->caja->nombre }}
                        </td>

                        <td class="p-3">
                            {{ $turno->estado }}
                        </td>

                        <td class="p-3 flex gap-2">

                            <!-- BOTÓN EDITAR -->
                            <a href="{{ route('turnos.edit', $turno) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                Editar
                            </a>

                            <!-- BOTÓN ELIMINAR -->
                            <form action="{{ route('turnos.destroy', $turno) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Eliminar turno?')">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    Eliminar
                                </button>
                            </form>

                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

    </div>
</x-app-layout>