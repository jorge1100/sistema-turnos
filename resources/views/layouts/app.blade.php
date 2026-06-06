<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Turnos</title>
</head>

<body>

{{-- ✅ Mostrar menú excepto en pantalla --}}
@if(Route::currentRouteName() != 'turnos.pantalla')
<nav style="background:#333; padding:10px;">
    <a href="{{ route('home') }}" style="color:white; margin-right:15px;">Inicio</a>
    <a href="{{ route('turnos.index') }}" style="color:white; margin-right:15px;">Turnos</a>
    <a href="{{ route('servicios.index') }}" style="color:white; margin-right:15px;">Servicios</a>
    <a href="{{ route('cajas.index') }}" style="color:white; margin-right:15px;">Cajas</a>
    <a href="{{ route('turnos.pantalla') }}" style="color:white;">Pantalla</a>
</nav>
@endif

<div style="padding:20px;">
    @yield('content')
</div>

</body>
</html>