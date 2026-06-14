<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Euforia Boutique</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-900">

    <!-- HEADER -->
    <div class="bg-black text-white py-6 text-center">
        <h1 class="text-4xl font-bold tracking-widest">
            EUFORIA BOUTIQUE
        </h1>
        <p class="text-sm mt-1">Sistema de atención</p>
    </div>

    <!-- TURNO ACTUAL -->
    <div class="flex justify-center mt-10">

        <div class="bg-pink-500 text-white px-20 py-10 rounded-2xl shadow-xl text-center">

            @if(count($turnos) > 0)
                @php $actual = $turnos->first(); @endphp

                <p class="text-lg mb-2">Turno actual</p>

                <h2 class="text-8xl font-bold">
                    {{ $actual->numero }}
                </h2>

                <p class="text-2xl mt-3">
                    Caja {{ $actual->caja->nombre }}
                </p>
            @else
                <p>No hay turnos</p>
            @endif

        </div>

    </div>

    <!-- LISTA TURNOS -->
    <div class="max-w-6xl mx-auto mt-12 grid grid-cols-4 gap-6 px-6">

        @foreach($turnos as $turno)
            <div class="bg-gray-100 rounded-xl p-6 text-center shadow">

                <div class="text-3xl font-bold text-pink-600">
                    {{ $turno->numero }}
                </div>

                <div class="mt-2 text-gray-700">
                    Caja {{ $turno->caja->nombre }}
                </div>

                <div class="mt-2 text-sm">
                    @if($turno->estado == 'esperando')
                        <span class="text-yellow-500 font-semibold">
                            Esperando
                        </span>
                    @elseif($turno->estado == 'atendiendo')
                        <span class="text-blue-600 font-semibold">
                            Atendiendo
                        </span>
                    @else
                        <span class="text-green-600 font-semibold">
                            Finalizado
                        </span>
                    @endif
                </div>

            </div>
        @endforeach

    </div>

    <!-- REFRESH -->
    <script>
        setInterval(() => {
            location.reload();
        }, 4000);
    </script>

</body>
</html>