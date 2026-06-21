<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- Define el idioma dinámicamente (ej: es-AR) -->
    <head>
        <meta charset="utf-8"> <!-- Permite usar caracteres especiales -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Hace la página adaptable a móviles -->
        <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Token de seguridad para formularios en Laravel -->

        <title>{{ config('app.name', 'Laravel') }}</title> <!-- Muestra el nombre de la app desde la configuración -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net"> <!-- Mejora la carga de fuentes externas -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> 
        <!-- Importa la fuente Figtree con distintos pesos -->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']) 
        <!-- Carga archivos CSS y JS usando Vite (bundler de Laravel) -->
    </head>
    
    <!-- 
        Body con estilos Tailwind:
        - min-h-screen: ocupa toda la altura de la pantalla
        - bg-gradient-to-br: fondo con gradiente diagonal (de arriba-izq a abajo-der)
        - from-pink-500 via-purple-600 to-indigo-700: colores del gradiente
        - flex: usa flexbox
        - items-center: centra verticalmente
        - justify-center: centra horizontalmente
    -->
    <body class="min-h-screen 
                bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
                flex items-center justify-center">

        {{ $slot }} <!-- Aquí se inserta dinámicamente el contenido de la vista -->

    </body>

</html>