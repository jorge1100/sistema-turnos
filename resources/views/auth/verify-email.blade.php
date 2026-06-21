<x-guest-layout>
<!-- Layout para usuarios NO autenticados -->

    <!-- MENSAJE PRINCIPAL -->
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>
    <!-- 
    Mensaje informativo:
    - Le dice al usuario que debe verificar su email
    - Se usa __() para traducciones
    -->

    @if (session('status') == 'verification-link-sent')
        <!-- MENSAJE DE CONFIRMACIÓN -->
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif
    <!-- 
    Si el usuario ya pidió reenviar el email:
    - Laravel guarda un "status" en la sesión
    - Se muestra este mensaje confirmando el envío
    -->

    <!-- CONTENEDOR DE ACCIONES -->
    <div class="mt-4 flex items-center justify-between">

        <!-- FORMULARIO: REENVIAR EMAIL -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <!-- Seguridad CSRF -->

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
            <!-- Botón que envía nuevamente el email de verificación -->
        </form>

        <!-- FORMULARIO: LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 
                       rounded-md focus:outline-none focus:ring-2 
                       focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
            <!-- Botón para cerrar sesión -->
        </form>

    </div>

</x-guest-layout>
