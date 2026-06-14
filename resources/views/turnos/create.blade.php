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

        <!-- ✅ CLIENTE SELECCIONADO (MEJORADO) -->
        @if(isset($clienteSeleccionado))
            @php
                $clienteActual = $clientes->firstWhere('id', $clienteSeleccionado);
            @endphp

            @if($clienteActual)
            <div class="mb-4 bg-white/10 border border-white/30 p-3 rounded-lg text-center backdrop-blur-md">
                <span class="text-white/70">Cliente seleccionado:</span>
                <div class="text-lg font-bold text-pink-300">
                    {{ $clienteActual->nombre }}
                </div>
            </div>
            @endif
        @endif

        <!-- BOTON CREAR CLIENTE -->
        <div class="mb-4 text-center">
            <a href="{{ route('clientes.create') }}"
               class="bg-pink-500 hover:bg-pink-600 px-4 py-2 rounded-lg text-white font-bold">
                + Crear nuevo cliente
            </a>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('turnos.store') }}">
            @csrf

            <!-- CLIENTE -->
            <div class="mb-4">
                <label class="text-white/80">Cliente</label>

                <select name="cliente_id"
                        class="w-full p-3 rounded-lg bg-white/20 text-white 
                               border border-white/20 outline-none
                               focus:ring-2 focus:ring-pink-400 appearance-none">

                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ (isset($clienteSeleccionado) && $clienteSeleccionado == $cliente->id) ? 'selected' : '' }}
                            class="text-black">
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- CAJA -->
            <div class="mb-4">
                <label class="text-white/80">Caja</label>

                <select name="caja_id"
                        class="w-full p-3 rounded-lg bg-white/20 text-white 
                               border border-white/20 outline-none
                               focus:ring-2 focus:ring-pink-400 appearance-none">

                    @foreach($cajas as $caja)
                        <option value="{{ $caja->id }}" class="text-black">
                            {{ $caja->nombre }}
                        </option>
                    @endforeach

                </select>
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
