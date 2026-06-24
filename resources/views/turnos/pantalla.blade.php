<!DOCTYPE html>
<html lang="es">
<!-- Documento HTML en español -->

<head>
    <meta charset="UTF-8">
    <!-- Permite caracteres especiales -->

    <title>Pantalla de Turnos</title>
    <!-- Título de la página -->

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Importa Tailwind CSS desde CDN -->

    <!-- AUTO REFRESH -->
    <meta http-equiv="refresh" content="5">
    <!-- Recarga la página cada 5 segundos automáticamente -->
</head>

<body class="min-h-screen 
             bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
             text-white flex flex-col items-center">
    <!-- 
        Cuerpo de la página:
        - min-h-screen → ocupa toda la altura
        - bg-gradient → fondo degradado
        - text-white → texto blanco
        - flex flex-col → disposición vertical
        - items-center → centra horizontalmente
    -->

    <!-- TITULO -->
    <h1 class="text-4xl font-bold mt-8 mb-6">
        ✨ Turno en Atención
    </h1>
    <!-- Título principal -->

    <!-- RELOJ -->

    <div class="mb-4">

        <div class="bg-white/10
                    backdrop-blur-md
                    rounded-xl
                    px-6 py-3
                    shadow-lg
                    text-center">

            <div class="text-2xl font-bold">
                🕒 {{ $hora }}
            </div>

            <div class="text-sm text-white/70">
                {{ $fecha }}
            </div>

        </div>

    </div>
    
    <!-- TURNO CENTRAL -->
    <div class="bg-white/10 backdrop-blur-md p-10 rounded-xl shadow-xl text-center mb-10 w-2/3">
        <!-- 
            Tarjeta principal:
            - fondo transparente con efecto blur
            - centrado y con sombra
            - ocupa 2/3 del ancho
        -->

        @if($actual)
        <!-- Si hay un turno actual -->

            <!-- CAJA -->
            <p class="text-xl text-white/70">
                {{ $actual->caja->nombre }}
            </p>
            <!-- Nombre de la caja -->

            <!-- NUMERO -->
            <p class="text-8xl font-bold my-4">
                {{ $actual->numero }}
            </p>
            <!-- Número de turno en grande -->

            <!-- CLIENTE -->
            <p class="text-2xl text-pink-200">
                {{ $actual->cliente->nombre }}
            </p>
            <!-- Nombre del cliente -->

        @else
        <!-- Si no hay turno -->

            <p class="text-3xl">
                No hay turnos en atención
            </p>

        @endif

    </div>

    <!-- HISTORIAL -->
    <h2 class="text-2xl font-bold mb-4">
        Cajas atendiendo
    </h2>
    <!-- Subtítulo -->

    <div class="grid grid-cols-2 gap-6 w-full max-w-4xl px-6">
        <!-- 
            Grid:
            - 2 columnas
            - espacio entre elementos
            - ancho máximo
        -->

        @foreach($historial as $turno)
        <!-- Recorre los turnos en atención -->

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl text-center">
            <!-- Tarjeta por cada turno -->

            <!-- TEXTO -->
            <p class="text-sm text-white/60">
                Caja atendiendo
            </p>

            <!-- CAJA -->
            <p class="text-lg text-pink-200">
                {{ $turno->caja->nombre }}
            </p>

            <!-- NUMERO -->
            <p class="text-4xl font-bold mt-2">
                {{ $turno->numero }}
            </p>
            <!-- Número del turno -->

        </div>
        @endforeach

    </div>

</body>
</html>