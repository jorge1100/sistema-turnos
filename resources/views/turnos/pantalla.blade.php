
<!DOCTYPE html>
<html>
<head>
    <title>Pantalla</title>

    <meta http-equiv="refresh" content="5">

    <style>
        body {
            background: black;
            color: white;
            text-align: center;
            font-family: Arial;
        }

        .turno {
            font-size: 150px;
            color: yellow;
            animation: blink 1s infinite;
        }

        .nombre {
            font-size: 60px;
            color: cyan;
        }

        .info {
            font-size: 40px;
        }

        @keyframes blink {
            0%{opacity:1;}
            50%{opacity:0.3;}
            100%{opacity:1;}
        }
    </style>

</head>

<body>

<h1>Turno en Atención</h1>

@if($turno)

    <div class="turno">{{ $turno->numero }}</div>
    <h1>Nombre Pasiente</h1>
    <div class="nombre">{{ $turno->nombre }}</div>
    <!--
    <div class="info">
        Caja: {{ $turno->caja->nombre ?? '-' }}
    </div>
    -->
@else

    <h2>No hay turnos</h2>

@endif

</body>
</html>
