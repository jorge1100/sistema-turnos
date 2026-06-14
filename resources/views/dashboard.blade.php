<x-app-layout>

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            p-6 pt-10">

    <!-- BIENVENIDO -->
    <div class="mb-8 text-white">
        <h1 class="text-4xl font-bold">
            Bienvenido, {{ Auth::user()->name }}
        </h1>

        <p class="text-white/80 mt-1">
            Panel de gestión de Euforia Boutique
        </p>
    </div>

    <!-- TARJETAS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
            <h2 class="text-white/80 text-sm">Clientes</h2>
            <p class="text-3xl font-bold text-white">
                {{ \App\Models\Cliente::count() }}
            </p>
        </div>

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
            <h2 class="text-white/80 text-sm">Cajas</h2>
            <p class="text-3xl font-bold text-white">
                {{ \App\Models\Caja::count() }}
            </p>
        </div>

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
            <h2 class="text-white/80 text-sm">Turnos</h2>
            <p class="text-3xl font-bold text-white">
                {{ \App\Models\Turno::count() }}
            </p>
        </div>

    </div>

    <!-- TABLA -->
    <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg mb-10">

        <h2 class="text-xl font-bold text-white mb-4">
            Últimos Turnos
        </h2>

        <table class="w-full text-left text-white">
            <thead class="border-b border-white/30">
                <tr>
                    <th class="p-2">N°</th>
                    <th class="p-2">Cliente</th>
                    <th class="p-2">Caja</th>
                    <th class="p-2">Estado</th>
                </tr>
            </thead>

            <tbody>
                @foreach(\App\Models\Turno::with('cliente','caja')->latest()->take(5)->get() as $turno)
                <tr class="border-b border-white/20">
                    <td class="p-2 font-bold">
                        {{ $turno->numero }}
                    </td>
                    <td class="p-2">
                        {{ $turno->cliente->nombre }}
                    </td>
                    <td class="p-2">
                        {{ $turno->caja->nombre }}
                    </td>
                    <td class="p-2">
                        {{ ucfirst($turno->estado) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- SISTEMA -->
    <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg mb-6 text-white">

        <h2 class="text-2xl font-bold mb-2">
            Sistema de Turnos
        </h2>

        <p class="text-white/90 text-sm">
            Este sistema permite gestionar clientes, asignar turnos y organizar la atención
            dentro de la boutique. Su objetivo es mejorar la experiencia del usuario
            y optimizar el flujo de trabajo.
        </p>

    </div>

    <!-- MÁS CONTENIDO -->
    <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg text-white">

        <h2 class="text-xl font-bold mb-3">
            Funcionalidades del Sistema
        </h2>

        <ul class="space-y-2 text-white/90 text-sm">
            <li>✔ Gestión completa de clientes</li>
            <li>✔ Administración de cajas</li>
            <li>✔ Generación automática de turnos</li>
            <li>✔ Visualización en pantalla en tiempo real</li>
        </ul>

    </div>

</div>

</x-app-layout>
