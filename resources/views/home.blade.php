@extends('layouts.app')

@section('content')

<div class="card">

    <!-- ✅ BIENVENIDA -->
    <h1 style="font-size:28px; margin-bottom:10px;">
        Bienvenido al Sistema de Turnos
    </h1>

    <p style="color:#555; margin-bottom:20px;">
        Utilice el menú superior para navegar por el sistema.
    </p>

</div>

<!-- ✅ TARJETAS -->
<div style="display:flex; gap:20px; margin-top:20px;">

    <div class="card" style="flex:1; text-align:center;">
        <h2 style="margin-bottom:10px;">Turnos</h2>
        <p style="color:#666;">Gestión completa de atención</p>
    </div>

    <div class="card" style="flex:1; text-align:center;">
        <h2 style="margin-bottom:10px;">Servicios</h2>
        <p style="color:#666;">Administración de servicios</p>
    </div>

    <div class="card" style="flex:1; text-align:center;">
        <h2 style="margin-bottom:10px;">Cajas</h2>
        <p style="color:#666;">Control de atención</p>
    </div>

</div>

<!-- ✅ NOSOTROS -->
<div class="card" style="margin-top:20px; text-align:center;">

    <h2 style="margin-bottom:10px;">
        Nosotros
    </h2>

    <p style="color:#555; margin-bottom:15px;">
        Sistema desarrollado con Laravel para la gestión de turnos y optimización
        de la atención al cliente.
    </p>

    <p style="font-weight:bold;">
        Jorge Luis Rojas Jojot
    </p>

    <p style="color:#777;">
        Desarrollador del Sistema
    </p>

    <div style="margin-top:15px;">
        <a href="{{ asset('cv.pdf') }}" target="_blank">
            <button class="btn btn-atender">
                📄 Ver Currículum
            </button>
        </a>
    </div>

</div>

@endsection