<x-app-layout>
    <div class="max-w-md mx-auto p-6">

        <h1 class="text-xl font-bold mb-4">Nueva Caja</h1>

        <form action="{{ route('cajas.store') }}" method="POST">
            @csrf

            <label class="block mb-2">Nombre</label>
            <input type="text" name="nombre"
                   class="w-full border p-2 mb-4 rounded">

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Guardar
            </button>
        </form>

    </div>
</x-app-layout>