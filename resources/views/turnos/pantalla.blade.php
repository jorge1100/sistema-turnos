<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pantalla de Turnos</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AUTO REFRESH -->
    <meta http-equiv="refresh" content="5">
</head>

<body class="min-h-screen 
             bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
             text-white flex flex-col items-center">

    <!-- TITULO -->
    <h1 class="text-4xl font-bold mt-8 mb-6">
        ✨ Turno en Atención
    </h1>

    <!-- TURNO CENTRAL -->
    <div class="bg-white/10 backdrop-blur-md p-10 rounded-xl shadow-xl text-center mb-10 w-2/3">

        @if($actual)
            <!-- CAJA -->
            <p class="text-xl text-white/70">
                {{ $actual->caja->nombre }}
            </p>

            <!-- NUMERO -->
            <p class="text-8xl font-bold my-4">
                {{ $actual->numero }}
            </p>

            <!-- CLIENTE -->
            <p class="text-2xl text-pink-200">
                {{ $actual->cliente->nombre }}
            </p>
        @else
            <p class="text-3xl">
                No hay turnos en atención
            </p>
        @endif

    </div>

    <!-- HISTORIAL -->
    <h2 class="text-2xl font-bold mb-4">
        Cajas atendiendo
    </h2>

    <div class="grid grid-cols-2 gap-6 w-full max-w-4xl px-6">

        @foreach($historial as $turno)
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl text-center">

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

        </div>
        @endforeach

    </div>

</body>
</html>