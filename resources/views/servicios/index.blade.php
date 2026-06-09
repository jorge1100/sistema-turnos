@extends('layouts.app')

@section('content')

<div class="card">

    <h1 style="font-size:28px; margin-bottom:20px;">
        Lista de Servicios
    </h1>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach($servicios as $servicio)

            <tr>

                <td><strong>{{ $servicio->id }}</strong></td>

                <td>{{ $servicio->nombre }}</td>

                <td>

                    <!-- EDITAR -->
                    <a href="{{ route('servicios.edit', $servicio->id) }}">
                        <button class="btn btn-edit">Editar</button>
                    </a>

                    <!-- ELIMINAR -->
                    <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('¿Eliminar este servicio?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-delete">Eliminar</button>
                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <!-- BOTÓN NUEVO -->
    <div style="margin-top:20px;">
        <a href="{{ route('servicios.create') }}">
            <button class="btn btn-atender">
                + Nuevo Servicio
            </button>
        </a>
    </div>

</div>

@endsection