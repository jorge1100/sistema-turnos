<x-app-layout>
    <!-- 
        Componente principal del layout de Laravel.
        Todo el contenido se renderiza dentro del layout base (navbar, estructura, etc.).
    -->

    <x-slot name="header">
        <!-- 
            Define un contenido para la sección "header" del layout.
            Este slot se inserta en el lugar donde el layout tenga definido {{ $header }}.
        -->
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
        <!-- 
            Título de la página.
            __('Profile') permite traducciones (multilenguaje).
        -->
    </x-slot>

    <div class="py-12">
        <!-- Espaciado vertical -->

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- 
                Contenedor centrado con ancho máximo
                padding responsive
                space-y-6 → espacio entre bloques
            -->

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- Tarjeta con fondo blanco, sombra y bordes redondeados -->

                <div class="max-w-xl">
                    <!-- Limita el ancho del contenido -->

                    @include('profile.partials.update-profile-information-form')
                    <!-- 
                        Incluye un archivo Blade parcial.
                        Este formulario permite actualizar la información del perfil
                        (nombre, email, etc.).
                    -->

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- Segunda tarjeta -->

                <div class="max-w-xl">

                    @include('profile.partials.update-password-form')
                    <!-- 
                        Incluye el formulario para cambiar la contraseña del usuario.
                    -->

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- Tercera tarjeta -->

                <div class="max-w-xl">

                    @include('profile.partials.delete-user-form')
                    <!-- 
                        Incluye el formulario para eliminar la cuenta del usuario.
                        Generalmente requiere confirmación por seguridad.
                    -->

                </div>
            </div>

        </div>
    </div>

</x-app-layout>
<!-- Cierre del layout principal -->
