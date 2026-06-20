<x-app-layout>

<div class="min-h-screen
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700
            py-10 px-4">

    <div class="max-w-6xl mx-auto">

        <!-- BIENVENIDA -->
        <div class="mb-8 text-white">
            <h1 class="text-3xl sm:text-4xl font-bold">
                Bienvenido, {{ Auth::user()->name }}
            </h1>

            <p class="text-white/80 mt-2">
                Panel de gestión de Euforia Boutique
            </p>
        </div>

        <!-- TARJETAS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
                <h2 class="text-white/70 text-sm mb-2">
                    Clientes
                </h2>

                <p class="text-3xl font-bold text-white">
                    {{ \App\Models\Cliente::count() }}
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
                <h2 class="text-white/70 text-sm mb-2">
                    Cajas
                </h2>

                <p class="text-3xl font-bold text-white">
                    {{ \App\Models\Caja::count() }}
                </p>
            </div>

            <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
                <h2 class="text-white/70 text-sm mb-2">
                    Turnos
                </h2>

                <p class="text-3xl font-bold text-white">
                    {{ \App\Models\Turno::count() }}
                </p>
            </div>

        </div>

        <!-- ÚLTIMOS TURNOS -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg mb-8">

            <h2 class="text-xl font-bold text-white mb-4">
                Últimos Turnos
            </h2>

            <div class="overflow-x-auto">

                <table class="w-full text-white text-sm sm:text-base">

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

                        <tr class="border-b border-white/20 hover:bg-white/10">

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

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <!-- SISTEMA -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg mb-8 text-white">

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