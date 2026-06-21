<x-app-layout>
<!-- 
    Componente layout principal de Laravel.
    Todo el contenido se inserta dentro del diseño base (navbar, etc.).
-->

<div class="min-h-screen bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 flex items-start justify-center pt-16">
    <!-- 
        Contenedor principal:
        - min-h-screen → ocupa toda la altura de la pantalla
        - bg-gradient-to-br → fondo en degradado diagonal
        - flex → usa flexbox
        - items-start → alinea el contenido arriba
        - justify-center → centra horizontalmente
        - pt-16 → padding superior
    -->

    <div class="bg-white/10 p-8 rounded-xl w-full max-w-md text-white">
        <!-- 
            Caja contenedora del formulario:
            - bg-white/10 → fondo translúcido
            - p-8 → padding interno
            - rounded-xl → bordes redondeados
            - max-w-md → ancho máximo
            - text-white → texto en color blanco
        -->

        <h2 class="text-2xl font-bold mb-6">Editar Turno</h2>
        <!-- Título de la vista -->

        <form method="POST" action="{{ route('turnos.update',$turno) }}">
            <!-- 
                Formulario para actualizar un turno
                route('turnos.update', $turno) → envía el ID del turno
            -->

            @csrf
            <!-- Protección contra ataques CSRF -->

            @method('PUT')
            <!-- Método HTTP simulado PUT para actualización -->

            <select name="estado" class="w-full mb-4 p-3 rounded bg-white/20">
                <!-- 
                    Select para cambiar el estado del turno
                    name="estado" → campo que se envía al backend
                -->

                <option value="esperando">Esperando</option>
                <!-- Estado: esperando -->

                <option value="atendiendo">Atendiendo</option>
                <!-- Estado: en atención -->

                <option value="finalizado">Finalizado</option>
                <!-- Estado: terminado -->

            </select>

            <div class="flex gap-3">
                <!-- Contenedor de botones -->

                <button class="w-full bg-blue-500 py-2 rounded">
                    Actualizar
                </button>
                <!-- Botón que envía el formulario -->

                <a href="{{ route('turnos.index') }}"
                   class="w-full bg-gray-500 text-center py-2 rounded">
                    Volver
                </a>
                <!-- Enlace para volver al listado de turnos -->

            </div>

        </form>

    </div>

</div>

</x-app-layout>
<!-- Fin del layout -->