@extends('layouts.app')

@section('content')

<!-- ✅ TITULO -->
<div class="card">
    <h1 style="font-size:28px; margin-bottom:10px;">
        Dashboard
    </h1>

    <p style="color:#555;">
        Resumen general del sistema de turnos
    </p>
</div>

<!-- ✅ TARJETAS -->
<div style="display:flex; gap:20px; margin-top:20px;">

    <!-- TOTAL -->
    <div class="card" style="flex:1; text-align:center;">
        <h2 style="font-size:16px; color:#666;">Total</h2>
        <p style="font-size:30px; font-weight:bold;">
            {{ $total }}
        </p>
    </div>

    <!-- PENDIENTES -->
    <div class="card" style="flex:1; text-align:center; background:#fef3c7;">
        <h2 style="font-size:16px;">Pendientes</h2>
        <p style="font-size:30px; font-weight:bold;">
            {{ $pendientes }}
        </p>
    </div>

    <!-- EN ATENCIÓN -->
    <div class="card" style="flex:1; text-align:center; background:#dbeafe;">
        <h2 style="font-size:16px;">En Atención</h2>
        <p style="font-size:30px; font-weight:bold;">
            {{ $atendiendo }}
        </p>
    </div>

    <!-- FINALIZADOS -->
    <div class="card" style="flex:1; text-align:center; background:#dcfce7;">
        <h2 style="font-size:16px;">Finalizados</h2>
        <p style="font-size:30px; font-weight:bold;">
            {{ $finalizados }}
        </p>
    </div>

</div>

@endsection