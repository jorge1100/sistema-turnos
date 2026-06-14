<x-app-layout>
    <div class="max-w-xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6">
            Editar Turno
        </h1>

        <form action="{{ route('turnos.update', $turno) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Cliente</label>
                <select name="cliente_id" class="w-full border p-2 rounded">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ $cliente->id == $turno->cliente_id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Caja</label>
                <select name="caja_id" class="w-full border p-2 rounded">
                    @foreach($cajas as $caja)
                        <option value="{{ $caja->id }}"
                            {{ $caja->id == $turno->caja_id ? 'selected' : '' }}>
                            {{ $caja->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Estado</label>
                <select name="estado" class="w-full border p-2 rounded">
                    <option value="esperando" {{ $turno->estado=='esperando'?'selected':'' }}>Esperando</option>
                    <option value="atendiendo" {{ $turno->estado=='atendiendo'?'selected':'' }}>Atendiendo</option>
                    <option value="finalizado" {{ $turno->estado=='finalizado'?'selected':'' }}>Finalizado</option>
                </select>
            </div>

            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>

        </form>

    </div>
</x-app-layout>