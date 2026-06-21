<x-app-layout>
<!-- Layout principal del sistema (usuarios autenticados) -->

<div class="min-h-screen 
            bg-gradient-to-br from-pink-500 via-purple-600 to-indigo-700 
            py-10 px-4">
<!-- 
Contenedor principal:
- min-h-screen → ocupa toda la pantalla
- bg-gradient → fondo degradado
- py-10 → padding vertical
- px-4 → padding horizontal
-->

    <!-- ✅ CONTENEDOR CENTRADO -->
    <div class="max-w-5xl mx-auto">
    <!-- 
    - max-w-5xl → ancho máximo grande
    - mx-auto → centra horizontalmente
    -->

        <!-- TITULO + BOTÓN NUEVO -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 text-white gap-3">
        <!-- 
        - flex → layout flexible
        - sm:flex-row → en pantallas grandes se pone en fila
        - gap-3 → espacio entre elementos
        -->

            <h1 class="text-3xl font-bold">Cajas</h1>
            <!-- Título principal -->

            <!-- BOTÓN NUEVA CAJA -->
            <a href="{{ route('cajas.create') }}"
               class="bg-purple-500 hover:bg-purple-600 px-4 py-2 rounded-lg text-white font-bold w-full sm:w-auto text-center">
                + Nueva
            </a>
            <!-- 
            Link para ir al formulario de crear caja:
            route('cajas.create')
            -->

        </div>

        <!-- TABLA -->
        <div class="bg-white/10 backdrop-blur-md p-6 rounded-xl shadow-lg">
        <!-- Contenedor de la tabla con efecto glass -->

            <!-- SCROLL RESPONSIVE -->
            <div class="overflow-x-auto">
            <!-- Permite scroll en pantallas pequeñas -->

                <table class="w-full text-white text-sm sm:text-base">
                <!-- Tabla de datos -->

                    <!-- CABECERA -->
                    <thead class="border-b border-white/30">
                        <tr>
                            <th class="p-3 text-left">ID</th>
                            <!-- ID de la caja -->

                            <th class="p-3 text-left">Nombre</th>
                            <!-- Nombre de la caja -->

                            <th class="p-3 text-center">Acciones</th>
                            <!-- Botones -->
                        </tr>
                    </thead>

                    <!-- CUERPO -->
                    <tbody>

                        @forelse($cajas as $caja)
                        <!-- 
                        Recorre todas las cajas:
                        $cajas viene del controlador
                        -->

                        <tr class="border-b border-white/20 hover:bg-white/10">
                        <!-- Fila con efecto hover -->

                            <td class="p-3">{{ $caja->id }}</td>
                            <!-- Muestra ID -->

                            <td class="p-3">{{ $caja->nombre }}</td>
                            <!-- Muestra nombre -->

                            <td class="p-3">
                                <div class="flex flex-col sm:flex-row gap-2 justify-center">
                                <!-- Contenedor de botones -->

                                    <!-- EDITAR -->
                                    <a href="{{ route('cajas.edit', $caja) }}"
                                       class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded text-white text-center">
                                        Editar
                                    </a>
                                    <!-- 
                                    Va al formulario de edición
                                    -->

                                    <!-- ELIMINAR -->
                                    <form action="{{ route('cajas.destroy', $caja) }}"
                                          method="POST"
                                          onsubmit="return confirm('⚠️ ¿Eliminar caja?')">
                                    <!-- 
                                    Formulario para eliminar:
                                    - POST + DELETE
                                    - confirm → alerta antes de borrar
                                    -->

                                        @csrf
                                        <!-- Seguridad -->

                                        @method('DELETE')
                                        <!-- Indica método DELETE -->

                                        <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white w-full">
                                            Eliminar
                                        </button>
                                        <!-- Botón eliminar -->
                                    </form>

                                </div>
                            </td>

                        </tr>

                        @empty
                        <!-- Si no hay cajas -->

                        <tr>
                            <td colspan="3" class="text-center py-4 text-white/70">
                                No hay cajas registradas
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</x-app-layout>