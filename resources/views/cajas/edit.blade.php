@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto">

    <h1 class="text-2xl font-bold mb-6 text-gray-700 text-center">
        Editar Caja
    </h1>

    <div class="bg-white shadow-lg rounded-xl p-6">

        <form action="{{ route('cajas.update', $caja) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <label class="block mb-2 font-semibold text-gray-600">
                Nombre
            </label>

            <input type="text" name="nombre"
                   value="{{ $caja->nombre }}"
                   class="w-full border p-2 rounded mb-4"
                   required>

            <!-- Estado -->
            <label class="block mb-2 font-semibold text-gray-600">
                Estado
            </label>

            <select name="estado" class="w-full border p-2 rounded mb-4">

                <option value="1" {{ $caja->estado ? 'selected' : '' }}>
                    Activa
                </option>

                <option value="0" {{ !$caja->estado ? 'selected' : '' }}>
                    Inactiva
                </option>

            </select>

            <!-- BOTÓN -->
            <div class="text-center">
                <button class="bg-emerald-500 text-white px-6 py-2 rounded hover:bg-emerald-600">
                    Guardar Cambios
                </button>
            </div>

        </form>

    </div>

</div>

@endsection