<x-guest-layout>
<!-- Usa el layout para usuarios no autenticados -->

<div class="min-h-screen flex items-start justify-center pt-16 sm:pt-24
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 px-4">
    <!-- Contenedor principal:
         - ocupa toda la pantalla
         - centra el contenido horizontalmente
         - usa un fondo degradado (Tailwind CSS)
    -->

    <!-- CARD GLASS -->
    <div class="w-full max-w-md 
                bg-white/10 backdrop-blur-md 
                p-6 sm:p-8 rounded-2xl shadow-2xl 
                border border-white/20 text-white">
        <!-- Tarjeta tipo "glassmorphism":
             - fondo semitransparente
             - efecto blur (vidrio)
             - bordes redondeados
             - sombra
        -->

        <!-- TITULO -->
        <div class="text-center mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold">
                🔒 Recuperar contraseña
            </h1>
            <!-- Título principal -->

            <p class="text-white/70 text-sm mt-1">
                Ingresá tu email para restablecerla
            </p>
            <!-- Subtítulo descriptivo -->
        </div>

        <!-- TEXTO -->
        <p class="text-sm text-white/70 mb-4 text-center">
            Te enviaremos un enlace para crear una nueva contraseña.
        </p>
        <!-- Explicación sobre el proceso -->

        <!-- FORM -->
        <form method="POST" action="{{ route('password.email') }}">
            <!-- Formulario que envía datos a la ruta para recuperar contraseña -->
            
            @csrf
            <!-- Token de seguridad contra ataques CSRF -->

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="text-sm text-white/80">
                    Correo electrónico
                </label>
                <!-- Etiqueta del campo -->

                <input type="email" name="email"
                       class="w-full mt-1 p-3 rounded-lg 
                              bg-white/20 text-white 
                              placeholder-white/60
                              outline-none border border-white/20
                              focus:ring-2 focus:ring-pink-400"
                       required>
                <!-- Campo de email:
                     - required → obligatorio
                     - estilos personalizados con Tailwind
                     - efecto focus
                -->
            </div>

            <!-- BOTON -->
            <button class="w-full bg-pink-500 hover:bg-pink-600 
                           py-2 rounded-lg font-bold">
                Enviar enlace
            </button>
            <!-- Botón para enviar el formulario -->

        </form>

        <!-- VOLVER -->
        <p class="text-center mt-4 text-sm text-white/70">
            <a href="{{ route('login') }}" class="text-pink-300 hover:text-white">
                ← Volver al login
            </a>
        </p>
        <!-- Enlace para volver a la pantalla de login -->

    </div>

</div>

</x-guest-layout>