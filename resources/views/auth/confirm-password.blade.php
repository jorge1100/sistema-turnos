<x-guest-layout>
    <!-- Usa el layout de invitado (usuarios NO autenticados) -->

    <div class="mb-4 text-sm text-gray-600">
        <!-- Mensaje informativo -->
        <!-- __() permite traducción del texto -->
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <!-- Formulario que envía la contraseña para confirmación -->
    <form method="POST" action="{{ route('password.confirm') }}">
        <!-- Método POST hacia la ruta que verifica la contraseña -->

        @csrf
        <!-- Token de seguridad contra ataques CSRF -->

        <!-- Password -->
        <div>
            <!-- Etiqueta del campo contraseña -->
            <x-input-label for="password" :value="__('Password')" />

            <!-- Campo de entrada de contraseña -->
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password" 
                            name="password" 
                            required autocomplete="current-password" />
            <!-- 
                type="password" → oculta lo que escribe el usuario
                name="password" → nombre del campo enviado
                required → obligatorio
                autocomplete="current-password" → ayuda al navegador a autocompletar
            -->

            <!-- Muestra errores de validación del campo password -->
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Botón de envío -->
        <div class="flex justify-end mt-4">
            <x-primary-button>
                <!-- Texto del botón -->
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>