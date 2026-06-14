<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Nuevo Cliente</h1>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <label>Nombre:</label>
            <input type="text" name="nombre"
                   class="border w-full p-2 mb-4">

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Guardar
            </button>
        </form>
    </div>
</x-app-layout>