<x-guest-layout>
<!-- Layout de Laravel para usuarios NO autenticados -->

    <form method="POST" action="{{ route('password.store') }}">
        <!-- 
        Formulario:
        - method POST → envía datos al servidor
        - route('password.store') → ruta que procesa el cambio de contraseña
        -->

        @csrf
        <!-- Token de seguridad CSRF (obligatorio en Laravel) -->

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <!-- 
        Token oculto:
        - Laravel lo usa para validar que el link de recuperación es válido
        - viene desde el email que se le envía al usuario
        -->

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <!-- Label del campo email -->

            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="email" 
                name="email" 
                :value="old('email', $request->email)" 
                required autofocus 
                autocomplete="username" />
            <!-- 
            Input email:
            - old(...) → mantiene el valor si hay error
            - $request->email → viene del link de recuperación
            - autofocus → cursor automático
            -->

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <!-- Muestra errores de validación -->
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <!-- Label contraseña -->

            <x-text-input 
                id="password" 
                class="block mt-1 w-full" 
                type="password" 
                name="password" 
                required 
                autocomplete="new-password" />
            <!-- 
            Input contraseña:
            - autocomplete="new-password" → ayuda al navegador
            -->

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <!-- Label confirmar contraseña -->

            <x-text-input 
                id="password_confirmation" 
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation" 
                required 
                autocomplete="new-password" />
            <!-- Input confirmación -->

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- BOTÓN -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
            <!-- Botón para enviar el formulario -->
        </div>

    </form>
</x-guest-layout>
