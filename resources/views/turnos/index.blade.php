@extends('layouts.app')

@section('content')

<div class="card">

    <h1 style="font-size:28px; margin-bottom:20px;">
        Lista de Turnos
    </h1>

    <table>

        <thead>
            <tr>
                <th>Número</th>
                <th>Nombre</th>
                <th>Servicio</th>
                <th>Caja</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach($turnos as $turno)

            <tr>

                <td><strong>{{ $turno->numero }}</strong></td>

                <td>{{ $turno->nombre }}</td>

                <td>{{ $turno->servicio->nombre ?? '-' }}</td>

                <td>{{ $turno->caja->nombre ?? 'Sin asignar' }}</td>

                <td>
                    @if($turno->estado == 'pendiente')
                        <span style="background:#fef3c7; padding:5px 10px; border-radius:5px;">
                            Pendiente
                        </span>
                    @elseif($turno->estado == 'en_atencion')
                        <span style="background:#d1fae5; padding:5px 10px; border-radius:5px;">
                            En atención
                        </span>
                    @else
                        <span style="background:#bbf7d0; padding:5px 10px; border-radius:5px;">
                            Finalizado ✅
                        </span>
                    @endif
                </td>

                <td>

                    <!-- EDITAR -->
                    <a href="{{ route('turnos.edit', $turno->id) }}">
                        <button class="btn btn-edit">Editar</button>
                    </a>

                    <!-- ATENDER -->
                    <form action="{{ route('turnos.update', $turno->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="estado" value="en_atencion">
                        <button class="btn btn-atender">Atender</button>
                    </form>

                    <!-- FINALIZAR -->
                    <form action="{{ route('turnos.update', $turno->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="estado" value="atendido">
                        <button class="btn btn-finalizar">Finalizar</button>
                    </form>

                    <!-- ELIMINAR -->
                    <form action="{{ route('turnos.destroy', $turno->id) }}" method="POST" style="display:inline;"
                          onsubmit="return confirm('¿Eliminar este turno?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete">Eliminar</button>
                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <div style="margin-top:20px;">
        <a href="{{ route('turnos.create') }}">
            <button class="btn btn-atender">
                + Nuevo Turno
            </button>
        </a>
    </div>

</div>

@endsection