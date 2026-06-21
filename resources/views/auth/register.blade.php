<x-guest-layout>
<!-- Componente Blade que define el diseño base para usuarios NO autenticados -->

<div class="min-h-screen flex items-start justify-center pt-16 sm:pt-24
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 px-4">
<!-- 
Contenedor principal:
- min-h-screen → ocupa toda la altura de la pantalla
- flex → activa flexbox
- justify-center → centra horizontalmente
- items-start → alinea arriba (no en el centro vertical)
- pt-16 → separación superior
- bg-gradient → fondo degradado
-->

    <div class="w-full max-w-md 
                bg-white/10 backdrop-blur-md 
                p-6 sm:p-8 rounded-2xl shadow-2xl 
                border border-white/20 text-white">
    <!-- 
    Card principal:
    - max-w-md → ancho máximo
    - bg-white/10 → fondo transparente
    - backdrop-blur → efecto vidrio
    - shadow → sombra
    -->

        <!-- TITULO -->
        <h2 class="text-2xl sm:text-3xl font-bold text-center mb-6">
            Registrarse
        </h2>
        <!-- Encabezado del formulario -->

        <!-- FORMULARIO -->
        <form method="POST" action="{{ route('register') }}">
        <!-- 
        - POST → envía datos al servidor
        - route('register') → ruta de Laravel para crear usuario
        -->

            @csrf
            <!-- Protección contra ataques CSRF -->

            <!-- NOMBRE -->
            <div>
                <label class="text-sm text-white/80">Nombre</label>

                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       autofocus
                       class="w-full mt-1 px-3 py-2 sm:py-3 rounded-lg
                              bg-white/20 text-white
                              placeholder-white/60
                              outline-none border border-white/20
                              focus:ring-2 focus:ring-pink-400">
                <!-- 
                Campo de nombre:
                - old('name') → mantiene el valor si hubo error
                - autofocus → cursor automático
                -->

                <!-- ERRORES -->
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-300" />
            </div>

            <!-- EMAIL -->
            <div class="mt-4">
                <label class="text-sm text-white/80">Correo electrónico</label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       class="w-full mt-1 px-3 py-2 sm:py-3 rounded-lg
                              bg-white/20 text-white
                              placeholder-white/60
                              outline-none border border-white/20
                              focus:ring-2 focus:ring-pink-400">
                <!-- Campo email -->

                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
            </div>

            <!-- PASSWORD -->
            <div class="mt-4">
                <label class="text-sm text-white/80">Contraseña</label>

                <div class="relative mt-1">
                <!-- Contenedor relativo para ubicar el icono 👁 -->

                    <input type="password"
                           id="password"
                           name="password"
                           required
                           class="w-full px-3 py-2 sm:py-3 rounded-lg
                                  bg-white/20 text-white
                                  placeholder-white/60
                                  outline-none border border-white/20
                                  focus:ring-2 focus:ring-pink-400
                                  pr-12">
                    <!-- pr-12 → espacio para el icono -->

                    <!-- BOTÓN OJO -->
                    <button type="button"
                            id="togglePassword"
                            class="absolute right-3 top-1/2 -translate-y-1/2 
                                   text-white/70 hover:text-white transition">
                        👁️
                    </button>
                    <!-- 
                    Posicionamiento:
                    - absolute → dentro del input
                    - right-3 → pegado a la derecha
                    - top-1/2 + translate → centrado vertical
                    -->

                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="mt-4">
                <label class="text-sm text-white/80">Confirmar contraseña</label>

                <div class="relative mt-1">

                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           required
                           class="w-full px-3 py-2 sm:py-3 rounded-lg
                                  bg-white/20 text-white
                                  placeholder-white/60
                                  outline-none border border-white/20
                                  focus:ring-2 focus:ring-pink-400
                                  pr-12">

                    <!-- BOTÓN OJO -->
                    <button type="button"
                            id="togglePasswordConfirm"
                            class="absolute right-3 top-1/2 -translate-y-1/2 
                                   text-white/70 hover:text-white transition">
                        👁️
                    </button>

                </div>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-300" />
            </div>

            <!-- BOTONES -->
            <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-3">

                <!-- LOGIN -->
                <a class="text-sm text-white/70 hover:text-white"
                   href="{{ route('login') }}">
                    ¿Ya tenés cuenta?
                </a>

                <!-- REGISTRAR -->
                <button type="submit"
                        class="w-full sm:w-auto bg-pink-500 hover:bg-pink-600 
                               text-white py-2 sm:py-3 px-6 rounded-lg font-semibold transition">
                    Registrarse
                </button>
            </div>

        </form>

    </div>

</div>

<!-- SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Espera que el DOM esté listo

    // PASSWORD
    const password = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', function () {
        // Alternar visibilidad
        if (password.type === 'password') {
            password.type = 'text';
            togglePassword.innerHTML = '🙈'; // icono cerrado
        } else {
            password.type = 'password';
            togglePassword.innerHTML = '👁️'; // icono abierto
        }
    });

    // CONFIRM PASSWORD
    const confirm = document.getElementById('password_confirmation');
    const toggleConfirm = document.getElementById('togglePasswordConfirm');

    toggleConfirm.addEventListener('click', function () {
        if (confirm.type === 'password') {
            confirm.type = 'text';
            toggleConfirm.innerHTML = '🙈';
        } else {
            confirm.type = 'password';
            toggleConfirm.innerHTML = '👁️';
        }
    });

});
</script>

</x-guest-layout>