@extends('layouts.app')

@section('content')

<h1>Servicios</h1>

<a href="{{ route('servicios.create') }}">
    Nuevo Servicio
</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>

    @foreach($servicios as $servicio)
    <tr>
        <td>{{ $servicio->nombre }}</td>
        <td>{{ $servicio->descripcion }}</td>
        <td>

            <!-- Editar -->
            <a href="{{ route('servicios.edit', $servicio) }}">
                Editar
            </a>

            <!-- Eliminar -->
            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>

        </td>
    </tr>
    @endforeach
</table>

@endsection
