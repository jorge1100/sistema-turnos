<!DOCTYPE html>
<!-- Indica que el documento utiliza HTML5 -->

<html lang="es">
<!-- Inicio del documento HTML y define el idioma español -->

<head>

    <meta charset="UTF-8">
    <!-- Permite mostrar correctamente caracteres especiales
         como acentos, ñ, símbolos y emojis -->

    <title>Pantalla de Turnos</title>
    <!-- Título que aparece en la pestaña del navegador -->

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Carga Tailwind CSS desde CDN para utilizar clases de diseño -->

    <!-- AUTO REFRESH -->
    <meta http-equiv="refresh" content="5">
    <!-- Recarga automáticamente la página cada 5 segundos
         para actualizar los turnos y la información mostrada -->

</head>

<body class="min-h-screen 
             bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
             text-white flex flex-col items-center">

    <!--
        CONTENEDOR PRINCIPAL

        min-h-screen
        → Hace que el body ocupe toda la altura de la pantalla.

        bg-gradient-to-br
        → Aplica un fondo degradado diagonal.

        from-pink-500
        → Color inicial del degradado.

        via-purple-600
        → Color intermedio.

        to-indigo-700
        → Color final.

        text-white
        → Todo el texto será blanco por defecto.

        flex
        → Activa Flexbox.

        flex-col
        → Organiza los elementos en columna.

        items-center
        → Centra horizontalmente todos los elementos.
    -->

    <!-- ===================================================== -->
    <!-- TITULO PRINCIPAL -->
    <!-- ===================================================== -->

    <h1 class="text-4xl font-bold mt-8 mb-6">

        ✨ Turno en Atención

    </h1>

    <!--
        text-4xl
        → Tamaño grande de fuente.

        font-bold
        → Texto en negrita.

        mt-8
        → Margen superior.

        mb-6
        → Margen inferior.
    -->

    <!-- ===================================================== -->
    <!-- RELOJ Y FECHA -->
    <!-- ===================================================== -->

    <div class="mb-4">

        <!--
            Contenedor externo del reloj.
            mb-4 agrega margen inferior.
        -->

        <div class="bg-white/10
                    backdrop-blur-md
                    rounded-xl
                    px-6 py-3
                    shadow-lg
                    text-center">

            <!--
                bg-white/10
                → Fondo blanco con 10% de transparencia.

                backdrop-blur-md
                → Efecto vidrio (glassmorphism).

                rounded-xl
                → Bordes redondeados.

                px-6 py-3
                → Espaciado interno horizontal y vertical.

                shadow-lg
                → Sombra grande.

                text-center
                → Centra el texto.
            -->

            <div class="text-2xl font-bold">

                🕒 {{ $hora }}

            </div>

            <!--
                Muestra la hora obtenida desde el controlador.
                Ejemplo: 18:30:15
            -->

            <div class="text-sm text-white/70">

                {{ $fecha }}

            </div>

            <!--
                Muestra la fecha obtenida desde el controlador.
                Ejemplo: 23/06/2026
            -->

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- TURNO ACTUAL -->
    <!-- ===================================================== -->

    <div class="bg-white/10 backdrop-blur-md p-10 rounded-xl shadow-xl text-center mb-10 w-2/3">

        <!--
            Tarjeta principal donde se muestra
            el turno actualmente atendido.

            p-10
            → Espaciado interno grande.

            shadow-xl
            → Sombra pronunciada.

            text-center
            → Centra todo el contenido.

            mb-10
            → Margen inferior.

            w-2/3
            → Ocupa dos tercios del ancho disponible.
        -->

        @if($actual)

        <!--
            Si existe un turno en atención,
            se muestra la información.
        -->

            <!-- =============================== -->
            <!-- NOMBRE DE LA CAJA -->
            <!-- =============================== -->

            <p class="text-xl text-white/70">

                {{ $actual->caja->nombre }}

            </p>

            <!--
                Muestra el nombre de la caja
                asociada al turno actual.
            -->

            <!-- =============================== -->
            <!-- NUMERO DEL TURNO -->
            <!-- =============================== -->

            <p class="text-8xl font-bold my-4">

                {{ $actual->numero }}

            </p>

            <!--
                Muestra el número del turno
                con tamaño muy grande para
                facilitar la visualización.
            -->

            <!-- =============================== -->
            <!-- NOMBRE DEL CLIENTE -->
            <!-- =============================== -->

            <p class="text-2xl text-pink-200">

                {{ $actual->cliente->nombre }}

            </p>

            <!--
                Muestra el nombre del cliente
                asociado al turno actual.
            -->

        @else

        <!--
            Si no existe ningún turno
            actualmente atendido.
        -->

            <p class="text-3xl">

                No hay turnos en atención

            </p>

        @endif

    </div>

    <!-- ===================================================== -->
    <!-- HISTORIAL DE CAJAS ATENDIENDO -->
    <!-- ===================================================== -->

    <h2 class="text-2xl font-bold mb-4">

        Cajas atendiendo

    </h2>

    <!--
        Subtítulo de la sección de historial.
    -->

    <div class="grid grid-cols-2 gap-6 w-full max-w-4xl px-6">

        <!--
            grid
            → Activa CSS Grid.

            grid-cols-2
            → Dos columnas.

            gap-6
            → Espacio entre tarjetas.

            w-full
            → Ocupa todo el ancho disponible.

            max-w-4xl
            → Limita el ancho máximo.

            px-6
            → Espaciado horizontal interno.
        -->

        @foreach($historial as $turno)

        <!--
            Recorre todos los turnos obtenidos
            desde el controlador y genera
            una tarjeta para cada uno.
        -->

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl text-center">

            <!--
                Tarjeta individual para cada turno.
            -->

            <!-- =============================== -->
            <!-- TEXTO DESCRIPTIVO -->
            <!-- =============================== -->

            <p class="text-sm text-white/60">

                Caja atendiendo

            </p>

            <!--
                Texto informativo.
            -->

            <!-- =============================== -->
            <!-- NOMBRE DE LA CAJA -->
            <!-- =============================== -->

            <p class="text-lg text-pink-200">

                {{ $turno->caja->nombre }}

            </p>

            <!--
                Muestra el nombre de la caja.
            -->

            <!-- =============================== -->
            <!-- NUMERO DEL TURNO -->
            <!-- =============================== -->

            <p class="text-4xl font-bold mt-2">

                {{ $turno->numero }}

            </p>

            <!--
                Muestra el número del turno.
            -->

        </div>

        @endforeach

        <!--
            Fin del recorrido de historial.
        -->

    </div>

</body>

</html>