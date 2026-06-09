<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Turnos</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f3f4f6;
        }

        /* NAVBAR */
        .nav {
            background: #10b981;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav a {
            color: white;
            margin-right: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .nav a:hover {
            text-decoration: underline;
        }

        /* CONTENEDOR */
        .container {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }

        /* TARJETAS */
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        /* TABLAS */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #e5e7eb;
            padding: 10px;
            text-align: center;
        }

        td {
            padding: 10px;
            border-top: 1px solid #ddd;
            text-align: center;
        }

        tr:hover {
            background: #f9fafb;
        }

        /* BOTONES */
        .btn {
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .btn-edit { background: #6b7280; }
        .btn-atender { background: #10b981; }
        .btn-finalizar { background: #f59e0b; }
        .btn-delete { background: #ef4444; }

    </style>

</head>

<body>

{{-- ✅ OCULTAR NAV EN PANTALLA --}}
@if(Route::currentRouteName() != 'turnos.pantalla')

<div class="nav">

    <!-- LOGO -->
    <div>
        Sistema de Turnos
    </div>

    <!-- MENÚ -->
    <div>
        <a href="{{ route('home') }}">Inicio</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('turnos.index') }}">Turnos</a>
        <a href="{{ route('servicios.index') }}">Servicios</a>
        <a href="{{ route('cajas.index') }}">Cajas</a>
        <a href="{{ route('turnos.pantalla') }}">Pantalla</a>
    </div>

    <!-- USUARIO -->
    <div>
        {{ auth()->user()->name }}

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-delete">Salir</button>
        </form>
    </div>

</div>

@endif

<!-- CONTENIDO -->
<div class="container">
    @yield('content')
</div>

</body>
</html>