<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- 
    Define el documento HTML 
    El idioma se genera dinámicamente según la configuración de Laravel
-->

<head>
    <meta charset="utf-8">
    <!-- Codificación UTF-8 -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Hace la página responsive -->

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Título dinámico desde la configuración -->

    @fonts
    <!-- Directiva Blade para cargar fuentes -->

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- 
            Si existe build o entorno Vite corriendo:
            carga los estilos y scripts compilados
        -->
    @else
        <style>
            /* 
                Aquí está todo el CSS de Tailwind embebido
                Se usa como fallback cuando Vite no está disponible
                (código muy largo de clases utilitarias de Tailwind)
            */
        </style>
    @endif
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
<!-- 
    Body:
    - Fondo claro u oscuro según modo dark
    - Flexbox vertical
    - Centrado en pantalla
-->

<header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
    <!-- Header principal -->

    @if (Route::has('login'))
    <!-- Verifica si existe la ruta login -->

        <nav class="flex items-center justify-end gap-4">
            <!-- Menú superior -->

            @auth
                {{ url('/dashboard') }}
                <!-- Si el usuario está autenticado muestra Dashboard -->
            @else

                {{ route('login') }}
                <!-- Link login -->

                @if (Route::has('register'))
                    {{ route('register') }}
                    <!-- Link registro -->
                @endif

            @endauth

        </nav>
    @endif
</header>

<div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
    <!-- Contenedor principal -->

    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <!-- Layout responsive -->

        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-6 lg:p-20 lg:pb-10 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <!-- Información principal -->

            <h1 class="mb-1 font-medium">Let's get started</h1>

            <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
                With so many options available to you,<br />
                we suggest you start with the following:
            </p>

            <ul class="flex flex-col mb-4 lg:mb-6">
                <!-- Lista de pasos -->

                <li class="flex items-center gap-4 py-2">
                    <!-- Item -->
                    Read the Documentation
                    <!-- Link a documentación Laravel -->
                </li>

                <li class="flex items-center gap-4 py-2">
                    Watch video tutorials at Laracasts
                    <!-- Tutoriales -->
                </li>

            </ul>

            <ul class="flex gap-3 text-sm leading-normal">
                <li>
                    <!-- Botón deploy -->
                    Deploy now
                </li>
            </ul>

            <p class="mt-6 lg:mt-10 text-[#706f6c] dark:text-[#A1A09A]">
                v{{ app()->version() }}
                <!-- Versión de Laravel -->

                View changelog
                <!-- Link a cambios -->
            </p>
        </div>

        <div class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/364] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
            <!-- Lado visual -->

            {{-- Laravel Logo --}}
            <!-- SVG logo de Laravel -->

                    13 --}}
            <!-- SVG decorativo con número 13 -->

            <div class="absolute inset-0 rounded-t-lg lg:rounded-r-lg shadow"></div>
            <!-- Sombra interna -->
        </div>

    </main>
</div>

@if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
@endif
<!-- Espaciador -->

</body>
</html>
