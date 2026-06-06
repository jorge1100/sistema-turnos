@extends('layouts.app')

@section('content')

<h1>Lista de Turnos</h1>

<a href="{{ route('turnos.create') }}">
    <button>Nuevo Turno</button>
</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Número</th>
        <th>Servicio</th>
        <th>Caja</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>

    @foreach($turnos as $turno)
    <tr>

        <!-- Número -->
        <td>{{ $turno->numero }}</td>

        <!-- Servicio -->
        <td>
            {{ $turno->servicio->nombre ?? 'Sin servicio' }}
        </td>

        <!-- Caja -->
        <td>
            {{ $turno->caja->nombre ?? 'Sin asignar' }}
        </td>

        <!-- Estado con color -->
        <td>
            @if($turno->estado == 'pendiente')
                <span style="color: orange; font-weight: bold;">Pendiente</span>
            @elseif($turno->estado == 'en_atencion')
                <span style="color: blue; font-weight: bold;">En Atención</span>
            @elseif($turno->estado == 'atendido')
                <span style="color: green; font-weight: bold;">Atendido</span>
            @elseif($turno->estado == 'cancelado')
                <span style="color: red; font-weight: bold;">Cancelado</span>
            @endif
        </td>

        <!-- Acciones -->
        <td>

            <!-- ATENDER -->
            <form action="{{ route('turnos.update', $turno) }}" method="POST" style="display:inline;">
                @csrf
                @method('PUT')

                <input type="hidden" name="estado" value="en_atencion">
                <input type="hidden" name="caja_id" value="1">

                <button type="submit">Atender</button>
            </form>

            <!-- FINALIZAR -->
            <form action="{{ route('turnos.update', $turno) }}" method="POST" style="display:inline;">
                @csrf
                @method('PUT')

                <input type="hidden" name="estado" value="atendido">
                <input type="hidden" name="caja_id" value="{{ $turno->caja_id }}">

                <button type="submit">Finalizar</button>
            </form>

            <br><br>

            <!-- EDITAR -->
            <a href="{{ route('turnos.edit', $turno) }}">
                <button>Editar</button>
            </a>

            <!-- ELIMINAR -->
            <form action="{{ route('turnos.destroy', $turno) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>

        </td>

    </tr>
    @endforeach
</table>

@endsection