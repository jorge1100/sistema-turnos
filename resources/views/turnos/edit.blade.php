@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto">

    <h1 class="text-2xl font-bold mb-6 text-gray-700 text-center">
        Editar Turno
    </h1>

    <div class="bg-white shadow-lg rounded-xl p-6">

        <!-- ✅ FORMULARIO CORRECTO -->
        <form action="{{ route('turnos.update', $turno) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- NOMBRE -->
            <label class="block mb-2 text-gray-600 font-semibold">
                Nombre
            </label>

            <input type="text" name="nombre"
                   value="{{ $turno->nombre }}"
                   class="w-full border p-2 rounded mb-4"
                   required>

            <!-- SERVICIO -->
            <label class="block mb-2 text-gray-600 font-semibold">
                Servicio
            </label>

            <select name="servicio_id" class="w-full border p-2 rounded mb-4">
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}"
                        {{ $turno->servicio_id == $servicio->id ? 'selected' : '' }}>
                        {{ $servicio->nombre }}
                    </option>
                @endforeach
            </select>

            <!-- BOTÓN -->
            <div class="text-center">
                <button class="bg-emerald-500 text-white px-6 py-2 rounded hover:bg-emerald-600">
                    Actualizar
                </button>
            </div>

        </form>

    </div>

</div>

@endsection