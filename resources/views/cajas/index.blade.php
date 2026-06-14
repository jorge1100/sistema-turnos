<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-4">Cajas</h1>

        <a href="{{ route('cajas.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Nueva Caja
        </a>

        <table class="w-full mt-4 border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
            @foreach($cajas as $caja)
                <tr class="border">
                    <td class="p-2">{{ $caja->id }}</td>
                    <td class="p-2">{{ $caja->nombre }}</td>

                    <td class="p-2 flex gap-2">

                        <!-- EDITAR -->
                        <a href="{{ route('cajas.edit', $caja) }}"
                           class="bg-yellow-400 px-3 py-1 rounded">
                            Editar
                        </a>

                        <!-- ELIMINAR -->
                        <form action="{{ route('cajas.destroy', $caja) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 text-white px-3 py-1 rounded">
                                Eliminar
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</x-app-layout>