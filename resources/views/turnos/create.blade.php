<x-app-layout>

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            flex items-start justify-center pt-16 px-4">

    <div class="bg-white/10 backdrop-blur-md 
                p-6 rounded-xl 
                w-full max-w-md text-white shadow-lg">

        <h2 class="text-2xl font-bold mb-6 text-center">
            Nuevo Turno
        </h2>

        @php
            $clienteActual = isset($clienteSeleccionado) 
                ? $clientes->firstWhere('id', $clienteSeleccionado) 
                : null;
        @endphp

        <!-- INFO CLIENTE -->
        @if($clienteActual)
        <div class="mb-4 bg-white/10 border border-white/30 p-3 rounded-lg text-center backdrop-blur-md">
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

        <!-- FORM -->
        <form method="POST" action="{{ route('turnos.store') }}">
        @csrf

        <!-- ✅ CLIENTE -->
        <div class="mb-4" 
             x-data="{
                open:false,
                selected:'{{ $clienteActual->nombre ?? 'Seleccionar cliente' }}',
                value:'{{ $clienteSeleccionado ?? '' }}'
             }"
             @click.outside="open=false">

            <label class="text-white/80">Cliente</label>

            <input type="hidden" name="cliente_id" :value="value">

            <div @click="open=!open"
                 class="w-full p-3 rounded-lg bg-white/10 border border-white/30 backdrop-blur-md cursor-pointer text-black">
                <span x-text="selected"></span>
            </div>

            <div x-show="open"
                 class="absolute w-full mt-1 bg-white/10 backdrop-blur-md border border-white/30 rounded-lg z-50">

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

            <label class="text-white/80">Caja</label>

            <input type="hidden" name="caja_id" :value="value">

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

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 py-2 rounded text-white font-bold">
                Guardar
            </button>

            <a href="{{ route('turnos.index') }}"
               class="w-full bg-gray-500 hover:bg-gray-600 text-center py-2 rounded text-white font-bold">
                Volver
            </a>

        </div>

        </form>

    </div>

</div>

</x-app-layout>
