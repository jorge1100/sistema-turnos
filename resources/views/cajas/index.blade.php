@extends('layouts.app')

@section('content')

<div class="card">

    <h1 style="font-size:28px; margin-bottom:20px;">
        Lista de Cajas
    </h1>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach($cajas as $caja)

            <tr>

                <td><strong>{{ $caja->id }}</strong></td>

                <td>{{ $caja->nombre }}</td>

                <td>
                    @if($caja->estado)
                        <span style="background:#d1fae5; padding:5px 10px; border-radius:5px;">
                            Activa
                        </span>
                    @else
                        <span style="background:#fee2e2; padding:5px 10px; border-radius:5px;">
                            Inactiva
                        </span>
                    @endif
                </td>

                <td>
                    {{ $caja->user->name ?? 'Sin asignar' }}
                </td>

                <td>

                    <!-- EDITAR -->
                    <a href="{{ route('cajas.edit', $caja->id) }}">
                        <button class="btn btn-edit">Editar</button>
                    </a>

                    <!-- ELIMINAR -->
                    <form action="{{ route('cajas.destroy', $caja->id) }}"
                          method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('¿Eliminar esta caja?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-delete">
                            Eliminar
                        </button>
                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <!-- NUEVA CAJA -->
    <div style="margin-top:20px;">
        <a href="{{ route('cajas.create') }}">
            <button class="btn btn-atender">
                + Nueva Caja
            </button>
        </a>
    </div>

</div>

@endsection