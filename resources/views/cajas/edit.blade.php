<x-app-layout>
    <div class="max-w-md mx-auto p-6">

        <h1 class="text-xl font-bold mb-4">Editar Caja</h1>

        <form action="{{ route('cajas.update', $caja) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-2">Nombre</label>
            <input type="text" name="nombre"
                   value="{{ $caja->nombre }}"
                   class="w-full border p-2 mb-4 rounded">

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Actualizar
            </button>
        </form>

    </div>
</x-app-layout>