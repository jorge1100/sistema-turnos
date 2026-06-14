<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Clientes</h1>

        <a href="{{ route('clientes.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            Nuevo Cliente
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
                @foreach($clientes as $cliente)
                <tr class="border">
                    <td class="p-2">{{ $cliente->id }}</td>
                    <td class="p-2">{{ $cliente->nombre }}</td>
                    <td class="p-2">

                        <a href="{{ route('clientes.edit', $cliente) }}"
                           class="bg-yellow-400 px-2 py-1 rounded">
                            Editar
                        </a>

                        <form action="{{ route('clientes.destroy', $cliente) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded">
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