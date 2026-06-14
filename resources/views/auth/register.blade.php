<x-guest-layout>

<div class="min-h-screen flex items-start justify-center pt-16 sm:pt-24
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 px-4">

    <div class="w-full max-w-md 
                bg-white/10 backdrop-blur-md 
                p-6 sm:p-8 rounded-2xl shadow-2xl 
                border border-white/20 text-white">

        <!-- TITULO -->
        <h2 class="text-2xl sm:text-3xl font-bold text-center mb-6">
            Registrarse
        </h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NOMBRE -->
            <div>
                <x-input-label for="name" :value="'Nombre'" class="text-white/80" />

                <x-text-input 
                    id="name"
                    class="block mt-1 w-full bg-white/20 text-white border-white/20 focus:ring-pink-400 focus:border-pink-400"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-300" />
            </div>

            <!-- EMAIL -->
            <div class="mt-4">
                <x-input-label for="email" :value="'Correo electrónico'" class="text-white/80" />

                <x-text-input 
                    id="email"
                    class="block mt-1 w-full bg-white/20 text-white border-white/20 focus:ring-pink-400 focus:border-pink-400"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required />

                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
            </div>

            <!-- PASSWORD -->
            <div class="mt-4">
                <x-input-label for="password" :value="'Contraseña'" class="text-white/80" />

                <x-text-input 
                    id="password"
                    class="block mt-1 w-full bg-white/20 text-white border-white/20 focus:ring-pink-400 focus:border-pink-400"
                    type="password"
                    name="password"
                    required />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
            </div>

            <!-- CONFIRMAR -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="'Confirmar contraseña'" class="text-white/80" />

                <x-text-input 
                    id="password_confirmation"
                    class="block mt-1 w-full bg-white/20 text-white border-white/20 focus:ring-pink-400 focus:border-pink-400"
                    type="password"
                    name="password_confirmation"
                    required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-300" />
            </div>

            <!-- BOTONES -->
            <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-3">

                <a class="text-sm text-white/70 hover:text-white"
                   href="{{ route('login') }}">
                    ¿Ya tenés cuenta?
                </a>

                <x-primary-button class="w-full sm:w-auto bg-pink-500 hover:bg-pink-600">
                    Registrarse
                </x-primary-button>

            </div>

        </form>

    </div>

</div>

</x-guest-layout>