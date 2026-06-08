<!DOCTYPE html>
<html>
<head>
    <title>Pantalla de Turnos</title>
    <meta http-equiv="refresh" content="3">
</head>

<body style="text-align:center; font-family: Arial;">

    <h1 style="font-size:50px;">TURNO EN ATENCIÓN</h1>

    @if($turno)
        <h2 style="font-size:100px; color:blue;">
            {{ $turno->numero }}
        </h2>

        <h3 style="font-size:50px;">
            {{ $turno->caja->nombre ?? 'Sin caja' }}
        </h3>
    @else
        <h2>No hay turnos en atención</h2>
    @endif

</body>
</html>