@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto">

    <h1 class="text-2xl font-bold mb-6 text-gray-700 text-center">
        Crear Caja
    </h1>

    <div class="bg-white shadow-lg rounded-xl p-6">

        <form action="{{ route('cajas.store') }}" method="POST">
            @csrf

            <label class="block mb-2 text-gray-600 font-semibold">
                Nombre
            </label>

            <input type="text" name="nombre" required
                class="w-full border rounded p-2 mb-4 focus:ring-2 focus:ring-emerald-400">

            <label class="block mb-2 text-gray-600 font-semibold">
                Estado
            </label>

            <select name="estado"
                class="w-full border rounded p-2 mb-4">
                
                <option value="1">Activa</option>
                <option value="0">Inactiva</option>

            </select>

            <div class="text-center">
                <button class="bg-emerald-500 text-white px-6 py-2 rounded-lg hover:bg-emerald-600">
                    Guardar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
