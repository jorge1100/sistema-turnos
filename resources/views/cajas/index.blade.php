@extends('layouts.app')

@section('content')

<h1>Cajas</h1>

<a href="{{ route('cajas.create') }}">
    Nueva Caja
</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Nombre</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>

    @foreach($cajas as $caja)
    <tr>
        <td>{{ $caja->nombre }}</td>
        <td>
            {{ $caja->estado ? 'Activa' : 'Inactiva' }}
        </td>
        <td>

            <!-- Editar -->
            <a href="{{ route('cajas.edit', $caja) }}">
                Editar
            </a>

            <!-- Eliminar -->
            <form action="{{ route('cajas.destroy', $caja) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>

        </td>
    </tr>
    @endforeach
</table>

@endsection