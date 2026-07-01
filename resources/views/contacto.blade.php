<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 py-10 px-4">

    <div class="max-w-4xl mx-auto">

        <!-- TITULO -->
        <div class="text-center mb-8">

            <h1 class="text-4xl font-bold text-white">
                Contacto
            </h1>

            <p class="text-white/80 mt-2">
                Envíanos tu consulta o comentario
            </p>

        </div>

        <!-- MENSAJE DE EXITO -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- ERRORES -->
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORMULARIO -->
        <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-lg">

            <form action="{{ route('contacto.enviar') }}" method="POST">

                @csrf

                <!-- NOMBRE -->
                <div class="mb-5">

                    <label class="block text-white mb-2 font-semibold">
                        Nombre
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        value="{{ old('nombre') }}"
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-white/60 border border-white/20 focus:ring-2 focus:ring-pink-400"
                        placeholder="Ingresa tu nombre">

                </div>

                <!-- EMAIL -->
                <div class="mb-5">

                    <label class="block text-white mb-2 font-semibold">
                        Correo Electrónico
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-white/60 border border-white/20 focus:ring-2 focus:ring-pink-400"
                        placeholder="correo@ejemplo.com">

                </div>

                <!-- MENSAJE -->
                <div class="mb-6">

                    <label class="block text-white mb-2 font-semibold">
                        Mensaje
                    </label>

                    <textarea
                        name="mensaje"
                        rows="6"
                        class="w-full p-3 rounded-lg bg-white/20 text-white placeholder-white/60 border border-white/20 focus:ring-2 focus:ring-pink-400"
                        placeholder="Escribe tu mensaje aquí...">{{ old('mensaje') }}</textarea>

                </div>

                <!-- BOTON -->
                <div class="flex justify-center">

                    <button
                        type="submit"
                        class="bg-purple-500 hover:bg-purple-600 text-white font-bold px-8 py-3 rounded-lg">
                        Enviar Mensaje
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>