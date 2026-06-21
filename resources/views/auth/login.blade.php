<x-guest-layout>
<!-- Componente Blade de Laravel que define el layout para usuarios no autenticados -->

<div class="min-h-screen flex items-start justify-center pt-16 sm:pt-24
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 px-4">
<!-- 
Contenedor principal:
- min-h-screen → altura mínima de toda la pantalla
- flex + justify-center → centra horizontalmente
- items-start → alinea arriba (no vertical centro)
- pt-16 → espacio arriba
- bg-gradient → fondo degradado
-->

    <!-- CARD GLASS -->
    <div class="w-full max-w-md 
                bg-white/10 backdrop-blur-md 
                p-6 sm:p-8 rounded-2xl shadow-2xl border border-white/20">
    <!-- 
    Tarjeta principal:
    - max-w-md → tamaño máximo
    - bg-white/10 → fondo semi transparente
    - backdrop-blur → efecto vidrio (glass)
    - rounded → bordes redondeados
    - shadow → sombra
    -->

        <!-- TITULO -->
        <div class="text-center mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-white">
                ✨ Euforia Boutique
            </h1>
            <!-- Título principal -->

            <p class="text-white/70 text-sm">
                Iniciar sesión
            </p>
            <!-- Subtítulo -->
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}">
            <!-- 
            Formulario:
            - method POST → envía datos
            - route('login') → ruta Laravel para login
            -->

            @csrf
            <!-- Token de seguridad obligatorio en Laravel -->

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="text-sm text-white/80">
                    Correo electrónico
                </label>

                <input type="email"
                       name="email"
                       class="w-full mt-1 px-3 py-2 sm:py-3 rounded-lg 
                              bg-white/20 text-white 
                              placeholder-white/60
                              outline-none border border-white/20
                              focus:ring-2 focus:ring-pink-400"
                       required>
                <!-- Input de email -->
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label class="text-sm text-white/80">
                    Contraseña
                </label>

                <!-- CONTENEDOR RELATIVO -->
                <div class="relative mt-1">
                <!-- Necesario para posicionar el ojo dentro -->

                    <!-- INPUT PASSWORD -->
                    <input type="password"
                           name="password"
                           id="password"
                           class="w-full px-3 py-2 sm:py-3 rounded-lg
                                  bg-white/20 text-white
                                  placeholder-white/60
                                  outline-none border border-white/20
                                  focus:ring-2 focus:ring-pink-400
                                  pr-12"
                           required>
                    <!-- pr-12 deja espacio para el icono -->

                    <!-- BOTON OJO -->
                    <button type="button"
                            id="togglePassword"
                            class="absolute right-3 top-1/2 -translate-y-1/2 
                                   text-white/70 hover:text-white transition">
                        👁️
                    </button>
                    <!-- 
                    Botón dentro del input:
                    - absolute → se posiciona dentro
                    - right-3 → alineado a la derecha
                    - translate-y-1/2 → centrado vertical
                    -->

                </div>
            </div>

            <!-- OPCIONES -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center text-sm mb-4 gap-2 text-white">
                
                <!-- RECORDAR -->
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    Recordarme
                </label>

                <!-- LINK RESET PASSWORD -->
                <a href="{{ route('password.request') }}"
                   class="text-white/70 hover:text-white">
                    ¿Olvidaste?
                </a>
            </div>

            <!-- BOTON LOGIN -->
            <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 
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

<!-- SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Espera a que cargue toda la página

    const password = document.getElementById('password');
    // Captura el input password

    const toggle = document.getElementById('togglePassword');
    // Captura el botón del ojo

    toggle.addEventListener('click', function () {
        // Evento click sobre el ojo

        if (password.type === 'password') {
            password.type = 'text';
            // Mostrar contraseña

            toggle.innerHTML = '🙈';
            // Cambiar icono
        } else {
            password.type = 'password';
            // Ocultar contraseña

            toggle.innerHTML = '👁️';
            // Restaurar icono
        }

    });

});
</script>

</x-guest-layout>