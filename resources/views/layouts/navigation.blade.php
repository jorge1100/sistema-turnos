<nav x-data="{ open: false }" class="bg-black border-b border-gray-800">

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <a href="{{ route('dashboard') }}" class="text-white font-bold text-xl">
                ✨ Euforia Boutique
            </a>

            <!-- MENÚ -->
            <div class="hidden sm:flex space-x-6">

                <a href="{{ route('dashboard') }}"
                   class="text-gray-300 hover:text-pink-400">
                    Inicio
                </a>

                <a href="{{ route('clientes.index') }}"
                   class="text-gray-300 hover:text-pink-400">
                    Clientes
                </a>

                <a href="{{ route('cajas.index') }}"
                   class="text-gray-300 hover:text-pink-400">
                    Cajas
                </a>

                <a href="{{ route('turnos.index') }}"
                   class="text-gray-300 hover:text-pink-400">
                    Turnos
                </a>

                <a href="{{ route('turnos.pantalla') }}"
                   class="text-gray-300 hover:text-pink-400">
                    Pantalla
                </a>

            </div>

            <!-- USUARIO -->
            <div class="hidden sm:flex items-center space-x-4">

                <span class="text-gray-300 text-sm">
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded">
                        Salir
                    </button>
                </form>

            </div>

            <!-- BOTÓN MOBILE -->
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open"
                    class="text-gray-300 hover:text-white focus:outline-none">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div x-show="open" class="sm:hidden bg-black border-t border-gray-700">

        <div class="px-4 py-3 space-y-2">

            <a href="{{ route('dashboard') }}" class="block text-gray-300 hover:text-pink-400">
                Inicio
            </a>

            <a href="{{ route('clientes.index') }}" class="block text-gray-300 hover:text-pink-400">
                Clientes
            </a>

            <a href="{{ route('cajas.index') }}" class="block text-gray-300 hover:text-pink-400">
                Cajas
            </a>

            <a href="{{ route('turnos.index') }}" class="block text-gray-300 hover:text-pink-400">
                Turnos
            </a>

            <a href="{{ route('turnos.pantalla') }}" class="block text-gray-300 hover:text-pink-400">
                Pantalla
            </a>

            <hr class="border-gray-700">

            <p class="text-gray-400 text-sm">
                {{ Auth::user()->name }}
            </p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-red-400 hover:text-red-500">
                    Cerrar sesión
                </button>
            </form>

        </div>
    </div>

</nav>