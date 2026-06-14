<x-guest-layout>

<div class="min-h-screen flex items-start justify-center pt-16 sm:pt-24
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 px-4">

    <!-- CARD GLASS -->
    <div class="w-full max-w-md 
                bg-white/10 backdrop-blur-md 
                p-6 sm:p-8 rounded-2xl shadow-2xl border border-white/20">

        <!-- TITULO -->
        <div class="text-center mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-white">
                ✨ Euforia Boutique
            </h1>
            <p class="text-white/70 text-sm">
                Iniciar sesión
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="text-sm text-white/80">
                    Correo electrónico
                </label>

                <input type="email" name="email"
                       class="w-full mt-1 px-3 py-2 sm:py-3 rounded-lg 
                              bg-white/20 text-white 
                              placeholder-white/60
                              outline-none border border-white/20
                              focus:ring-2 focus:ring-pink-400"
                       required>
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label class="text-sm text-white/80">
                    Contraseña
                </label>

                <input type="password" name="password"
                       class="w-full mt-1 px-3 py-2 sm:py-3 rounded-lg 
                              bg-white/20 text-white 
                              placeholder-white/60
                              outline-none border border-white/20
                              focus:ring-2 focus:ring-pink-400"
                       required>
            </div>

            <!-- OPCIONES -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center text-sm mb-4 gap-2 text-white">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    Recordarme
                </label>

                <a href="{{ route('password.request') }}"
                   class="text-white/70 hover:text-white">
                    ¿Olvidaste?
                </a>
            </div>

            <!-- BOTON -->
            <button class="w-full bg-pink-500 hover:bg-pink-600 
                           text-white py-2 sm:py-3 rounded-lg font-semibold transition">
                Iniciar sesión
            </button>

        </form>

        <!-- REGISTRO -->
        <p class="text-center mt-4 text-sm text-white/70">
            ¿No tenés cuenta?
            <a href="{{ route('register') }}" class="text-pink-300 hover:text-white">
                Registrarse
            </a>
        </p>

    </div>

</div>

</x-guest-layout>