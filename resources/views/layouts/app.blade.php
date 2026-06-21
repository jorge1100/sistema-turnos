<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- Define el idioma dinámico de la app (ej: es-AR) -->
    <head>
        <meta charset="utf-8"> <!-- Codificación de caracteres -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Hace el sitio responsive -->
        <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Token de seguridad para formularios -->

        <title>{{ config('app.name', 'Laravel') }}</title> <!-- Nombre de la app desde config -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net"> <!-- Optimiza la carga de fuentes -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> <!-- Fuente Figtree -->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Carga CSS y JS con Vite -->
    </head>
    <body class="font-sans antialiased"> <!-- Estilos base con Tailwind -->
        <div class="min-h-screen bg-gray-100"> <!-- Contenedor principal con fondo gris -->

            @include('layouts.navigation') <!-- Incluye la barra de navegación -->

            <!-- Page Heading -->
            @isset($header) <!-- Verifica si existe la variable $header -->
                <header class="bg-white shadow"> <!-- Contenedor del encabezado -->
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"> <!-- Ajustes de layout -->
                        {{ $header }} <!-- Inserta contenido dinámico del header -->
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }} <!-- Aquí se renderiza el contenido de cada vista -->
            </main>
        </div>
    </body>
</html>
