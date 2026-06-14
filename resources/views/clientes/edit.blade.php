<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Editar Cliente</h1>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nombre:</label>
            <input type="text" name="nombre"
                   value="{{ $cliente->nombre }}"
                   class="border w-full p-2 mb-4">

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Actualizar
            </button>
        </form>
    </div>
</x-app-layout>