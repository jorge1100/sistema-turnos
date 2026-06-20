<nav x-data="{ open: false }" class="bg-black border-b border-gray-800">

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-16 items-center">

            <!-- LOGO -->
            <a href="{{ route('dashboard') }}" class="text-white font-bold text-xl">
                ✨ Euforia Boutique
            </a>

            <!-- MENÚ DESKTOP -->
            <div class="hidden sm:flex space-x-6">

                <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-pink-400">
                    Inicio
                </a>

                <a href="{{ route('clientes.index') }}" class="text-gray-300 hover:text-pink-400">
                    Clientes
                </a>

                <a href="{{ route('cajas.index') }}" class="text-gray-300 hover:text-pink-400">
                    Cajas
                </a>

                <a href="{{ route('turnos.index') }}" class="text-gray-300 hover:text-pink-400">
                    Turnos
                </a>

                <a href="{{ route('nosotros') }}" class="text-gray-300 hover:text-pink-400">
                    Nosotros
                </a>

                <a href="{{ route('turnos.pantalla') }}" class="text-gray-300 hover:text-pink-400">
                    Pantalla
                </a>

            </div>

            <!-- USUARIO DESKTOP -->
            <div class="hidden sm:flex items-center"
                 x-data="{ userMenu: false }">

                <div class="relative">

                    <button
                        @click="userMenu = !userMenu"
                        class="flex items-center gap-2 text-gray-300 hover:text-pink-400">

                        <span>{{ Auth::user()->name }}</span>

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 9l-7 7-7-7" />
                        </svg>

                    </button>

                    <!-- SUBMENÚ -->
                    <div
                        x-show="userMenu"
                        @click.away="userMenu = false"
                        x-transition
                        class="absolute right-0 mt-2 w-48 bg-gray-900 border border-gray-700 rounded-lg shadow-lg z-50">

                        <div class="px-4 py-3 border-b border-gray-700 text-sm text-gray-300">
                            {{ Auth::user()->name }}
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button
                                type="submit"
                                class="w-full text-left px-4 py-3 text-red-400 hover:bg-gray-800">
                                Salir
                            </button>
                        </form>

                    </div>

                </div>

            </div>

            <!-- BOTÓN MOBILE -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open"
                        class="text-gray-300 hover:text-white">

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

    <!-- MENÚ MOBILE -->
    <div x-show="open"
         x-transition
         class="sm:hidden bg-black border-t border-gray-700">

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

            <a href="{{ route('nosotros') }}" class="block text-gray-300 hover:text-pink-400">
                Nosotros
            </a>

            <a href="{{ route('turnos.pantalla') }}" class="block text-gray-300 hover:text-pink-400">
                Pantalla
            </a>

            <hr class="border-gray-700">

            <div class="text-gray-400 text-sm">
                {{ Auth::user()->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="text-red-400 hover:text-red-500">
                    Salir
                </button>
            </form>

        </div>

    </div>

</nav>

