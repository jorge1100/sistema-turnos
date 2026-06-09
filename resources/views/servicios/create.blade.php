
@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto">

    <h1 class="text-2xl font-bold mb-4 text-gray-700">
        Crear Servicio
    </h1>

    <div class="bg-white p-6 rounded shadow">

        <form action="{{ route('servicios.store') }}" method="POST">
            @csrf

            <label class="block mb-2 text-gray-600">Nombre</label>
            <input type="text" name="nombre" required
                   class="border p-2 w-full mb-4 rounded">

            <button class="bg-emerald-500 text-white px-4 py-2 rounded hover:bg-emerald-600">
                Guardar
            </button>

        </form>

    </div>

</div>

@endsection
