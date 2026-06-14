<x-app-layout>
    <div class="max-w-xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6">
            Crear Nuevo Turno
        </h1>

        <form action="{{ route('turnos.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Cliente</label>
                <select name="cliente_id" class="w-full border rounded p-2">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Caja</label>
                <select name="caja_id" class="w-full border rounded p-2">
                    @foreach($cajas as $caja)
                        <option value="{{ $caja->id }}">
                            {{ $caja->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                Guardar Turno
            </button>
        </form>

    </div>
</x-app-layout>