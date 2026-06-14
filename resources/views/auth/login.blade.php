<x-guest-layout>

    <!-- Estado de sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Correo -->
        <div>
            <x-input-label for="email" :value="'Correo electrónico'" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Contraseña'" />

            <x-text-input 
                id="password" 
                class="block mt-1 w-full"
                type="password"
                name="password"
                required 
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordarme -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
                    name="remember">
                <span class="ml-2 text-sm text-gray-600">
                    Recordarme
                </span>
            </label>
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-between mt-4">

            <!-- LINK REGISTRO -->
            <a href="{{ route('register') }}"
               class="underline text-sm text-gray-600 hover:text-gray-900">
                ¿No tenés cuenta? Registrarse
            </a>

            <!-- BOTÓN LOGIN -->
            <x-primary-button class="ml-3">
                Iniciar sesión
            </x-primary-button>

        </div>

        <!-- RECUPERAR CONTRASEÑA -->
        <div class="mt-3 text-center">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

    </form>

</x-guest-layout>
