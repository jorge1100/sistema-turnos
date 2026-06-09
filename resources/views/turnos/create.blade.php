@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto">

    <!-- ✅ TÍTULO -->
    <h1 class="text-2xl font-bold mb-6 text-gray-700 text-center">
        Crear Turno
    </h1>

    <!-- ✅ MENSAJE ERROR -->
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- ✅ CAJA -->
    <div class="bg-white shadow-lg rounded-xl p-6">

        <!-- ✅ FORMULARIO CORRECTO -->
        <form action="{{ route('turnos.store') }}" method="POST">
            @csrf

            <!-- ✅ NOMBRE -->
            <label class="block text-gray-600 mb-2 font-semibold">
                Nombre del cliente
            </label>

            <input type="text" name="nombre" required
                class="w-full border rounded p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-emerald-400">

            <!-- ✅ SERVICIO -->
            <label class="block text-gray-600 mb-2 font-semibold">
                Servicio
            </label>

            <select name="servicio_id" required
                class="w-full border rounded p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-emerald-400">

                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">
                        {{ $servicio->nombre }}
                    </option>
                @endforeach

            </select>

            <!-- ✅ BOTÓN -->
            <div class="text-center mt-4">
                <button type="submit"
                    class="bg-emerald-500 text-white px-6 py-2 rounded-lg shadow hover:bg-emerald-600 font-semibold">
                    
                    ✅ Guardar Turno

                </button>
            </div>

        </form>

    </div>

</div>

@endsection