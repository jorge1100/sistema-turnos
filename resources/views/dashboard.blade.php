<x-app-layout>
<!-- Layout principal de Laravel -->

<div class="min-h-screen
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700
            py-10 px-4">
    <!-- 
        Contenedor principal:
        - min-h-screen → ocupa toda la pantalla
        - bg-gradient → fondo degradado
        - padding arriba y a los lados
    -->

    <div class="max-w-6xl mx-auto">
        <!-- Contenedor centrado con ancho máximo -->

        <!-- BIENVENIDA -->
        <div class="mb-8 text-white">
            <!-- Bloque de bienvenida -->

            <h1 class="text-3xl sm:text-4xl font-bold">
                Bienvenido, {{ Auth::user()->name }}
            </h1>
            <!-- Muestra el nombre del usuario autenticado -->

            <p class="text-white/80 mt-2">
                Panel de gestión de Euforia Boutique
            </p>
            <!-- Descripción del panel -->
        </div>

        <!-- TARJETAS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Grid responsive de tarjetas -->

            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
                <!-- Tarjeta Clientes -->
                <h2 class="text-white/70 text-sm mb-2">
                    Clientes
                </h2>

                <p class="text-3xl font-bold text-white">
                    {{ \App\Models\Cliente::count() }}
                </p>
                <!-- Muestra cantidad total de clientes -->
            </div>

            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
                <!-- Tarjeta Cajas -->
                <h2 class="text-white/70 text-sm mb-2">
                    Cajas
                </h2>

                <p class="text-3xl font-bold text-white">
                    {{ \App\Models\Caja::count() }}
                </p>
                <!-- Muestra cantidad total de cajas -->
            </div>

            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
                <!-- Tarjeta Turnos -->
                <h2 class="text-white/70 text-sm mb-2">
                    Turnos
                </h2>

                <p class="text-3xl font-bold text-white">
                    {{ \App\Models\Turno::count() }}
                </p>
                <!-- Muestra cantidad total de turnos -->
            </div>

        </div>

        <!-- ÚLTIMOS TURNOS -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg mb-8">
            <!-- Contenedor tabla -->

            <h2 class="text-xl font-bold text-white mb-4">
                Últimos Turnos
            </h2>

            <div class="overflow-x-auto">
                <!-- Scroll en pantallas chicas -->

                <table class="w-full text-white text-sm sm:text-base">
                    <!-- Tabla -->

                    <thead class="border-b border-white/30">
                        <tr>
                            <th class="p-3 text-left">N°</th>
                            <th class="p-3 text-left">Cliente</th>
                            <th class="p-3 text-left">Caja</th>
                            <th class="p-3 text-left">Estado</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach(\App\Models\Turno::with('cliente','caja')->latest()->take(5)->get() as $turno)
                    <!-- 
                        Obtiene los últimos 5 turnos:
                        - with() carga relaciones cliente y caja
                        - latest() ordena por fecha reciente
                        - take(5) limita a 5 registros
                    -->

                        <tr class="border-b border-white/20 hover:bg-white/10">
                            <!-- Fila -->

                            <td class="p-3 font-bold">
                                {{ $turno->numero }}
                            </td>

                            <td class="p-3">
                                {{ $turno->cliente->nombre }}
                            </td>

                            <td class="p-3">
                                {{ $turno->caja->nombre }}
                            </td>

                            <td class="p-3">

                                @if($turno->estado == 'esperando')
                                    <span class="bg-yellow-500 px-3 py-1 rounded text-white text-sm">
                                        Esperando
                                    </span>

                                @elseif($turno->estado == 'atendiendo')
                                    <span class="bg-blue-500 px-3 py-1 rounded text-white text-sm">
                                        En atención
                                    </span>

                                @else
                                    <span class="bg-green-500 px-3 py-1 rounded text-white text-sm">
                                        Finalizado
                                    </span>
                                @endif
                                <!-- Estado con colores -->

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <!-- SISTEMA -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg mb-8 text-white">
            <!-- Información del sistema -->

            <h2 class="text-2xl font-bold mb-3">
                Sistema de Turnos
            </h2>

            <p class="text-white/90">
                Este sistema permite gestionar clientes, asignar turnos y organizar la atención
                dentro de la boutique. Su objetivo es mejorar la experiencia del usuario y
                optimizar el flujo de trabajo.
            </p>
        </div>

        <!-- FUNCIONALIDADES -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg text-white">
            <!-- Lista de funcionalidades -->

            <h2 class="text-xl font-bold mb-4">
                Funcionalidades del Sistema
            </h2>

            <ul class="space-y-3 text-white/90">
                <li>✔ Gestión completa de clientes</li>
                <li>✔ Administración de cajas</li>
                <li>✔ Generación automática de turnos</li>
                <li>✔ Visualización en pantalla en tiempo real</li>
            </ul>

        </div>

    </div>

</div>

</x-app-layout>
<!-- Fin del layout -->