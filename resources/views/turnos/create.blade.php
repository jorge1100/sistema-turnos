<x-app-layout>
<!-- Layout principal de Laravel donde se renderiza todo el contenido -->

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center pt-16 px-4">
    <!-- 
        Contenedor principal:
        - min-h-screen → ocupa toda la pantalla
        - bg-gradient → fondo degradado (rosa, violeta, azul)
        - flex → usa flexbox
        - items-start → alinea el contenido arriba
        - justify-center → centra horizontalmente
        - pt-16 px-4 → padding superior y lateral
    -->

    <div class="bg-white/10 backdrop-blur-md 
                p-6 rounded-xl 
                w-full max-w-md text-white shadow-lg">
        <!-- 
            Tarjeta tipo glass (vidrio):
            - bg-white/10 → fondo transparente
            - backdrop-blur → efecto desenfoque
            - p-6 → padding interno
            - rounded-xl → bordes redondeados
            - max-w-md → ancho máximo
            - shadow-lg → sombra
        -->

        <h2 class="text-2xl font-bold mb-6 text-center">
            Nuevo Turno
        </h2>
        <!-- Título de la vista -->

        @php
            $clienteActual = isset($clienteSeleccionado) 
                ? $clientes->firstWhere('id', $clienteSeleccionado) 
                : null;
        @endphp
        <!-- 
            Busca el cliente seleccionado dentro de la colección
            Si no existe, queda en null
        -->

        <!-- INFO CLIENTE -->
        @if($clienteActual)
        <div class="mb-4 bg-white/10 border border-white/30 p-3 rounded-lg text-center backdrop-blur-md">
            <!-- Muestra el cliente actualmente seleccionado -->

            <span class="text-white/70">Cliente seleccionado:</span>

            <div class="text-lg font-bold text-pink-300">
                {{ $clienteActual->nombre }}
            </div>
        </div>
        @endif

        <!-- BOTON -->
        <div class="mb-4 text-center">
            <a href="{{ route('clientes.create') }}"
               class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-lg text-white font-bold">
                + Crear nuevo cliente
            </a>
        </div>
        <!-- Botón para redirigir a crear un nuevo cliente -->

        <!-- FORM -->
        <form method="POST" action="{{ route('turnos.store') }}">
        @csrf
        <!-- 
            Formulario que envía los datos para guardar un turno
            @csrf protege contra ataques CSRF
        -->

        <!-- ✅ CLIENTE -->
        <div class="mb-4" 
             x-data="{
                open:false,
                selected:'{{ $clienteActual->nombre ?? 'Seleccionar cliente' }}',
                value:'{{ $clienteSeleccionado ?? '' }}'
             }"
             @click.outside="open=false">
            <!-- 
                Dropdown personalizado con Alpine.js:
                - open → controla apertura
                - selected → texto mostrado
                - value → id seleccionado
            -->

            <label class="text-white/80">Cliente</label>

            <input type="hidden" name="cliente_id" :value="value">
            <!-- Input oculto que envía el ID del cliente -->

            <div @click="open=!open"
                 class="w-full p-3 rounded-lg bg-white/10 border border-white/30 backdrop-blur-md cursor-pointer text-black">
                <span x-text="selected"></span>
            </div>
            <!-- Selector visible -->

            <div x-show="open"
                 class="absolute w-full mt-1 bg-white/10 backdrop-blur-md border border-white/30 rounded-lg z-50">
                <!-- Lista desplegable -->

                @foreach($clientes as $cliente)
                <div @click="selected='{{ $cliente->nombre }}'; value='{{ $cliente->id }}'; open=false"
                     class="p-3 hover:bg-purple-600 cursor-pointer text-black">
                    {{ $cliente->nombre }}
                </div>
                @endforeach

            </div>
        </div>

        <!-- ✅ CAJA -->
        <div class="mb-4" 
             x-data="{
                open:false,
                selected:'Seleccionar caja',
                value:''
             }"
             @click.outside="open=false">
            <!-- Dropdown para seleccionar una caja -->

            <label class="text-white/80">Caja</label>

            <input type="hidden" name="caja_id" :value="value">
            <!-- Input oculto con ID de la caja -->

            <div @click="open=!open"
                 class="w-full p-3 rounded-lg bg-white/10 border border-white/30 backdrop-blur-md cursor-pointer text-black">
                <span x-text="selected"></span>
            </div>

            <div x-show="open"
                 class="absolute w-full mt-1 bg-white/10 backdrop-blur-md border border-white/30 rounded-lg z-50">

                @foreach($cajas as $caja)
                <div @click="selected='{{ $caja->nombre }}'; value='{{ $caja->id }}'; open=false"
                     class="p-3 hover:bg-purple-600 cursor-pointer text-black">
                    {{ $caja->nombre }}
                </div>
                @endforeach

            </div>
        </div>

        <!-- BOTONES -->
        <div class="flex gap-3">
            <!-- Contenedor de botones -->

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 py-2 rounded text-white font-bold">
                Guardar
            </button>
            <!-- Envía el formulario -->

            <a href="{{ route('turnos.index') }}"
               class="w-full bg-gray-500 hover:bg-gray-600 text-center py-2 rounded text-white font-bold">
                Volver
            </a>
            <!-- Regresa al listado -->

        </div>

        </form>

    </div>

</div>

</x-app-layout>
<!-- Fin del layout -->
