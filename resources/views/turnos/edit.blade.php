<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 flex items-start justify-center pt-16">

    <div class="bg-white/10 p-8 rounded-xl w-full max-w-md text-white">

        <h2 class="text-2xl font-bold mb-6">Editar Turno</h2>

        <form method="POST" action="{{ route('turnos.update',$turno) }}">
            @csrf
            @method('PUT')

            <select name="estado" class="w-full mb-4 p-3 rounded bg-white/20">
                <option value="esperando">Esperando</option>
                <option value="atendiendo">Atendiendo</option>
                <option value="finalizado">Finalizado</option>
            </select>

            <div class="flex gap-3">

                <button class="w-full bg-blue-500 py-2 rounded">Actualizar</button>

                <a href="{{ route('turnos.index') }}"
                   class="w-full bg-gray-500 text-center py-2 rounded">
                    Volver
                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>