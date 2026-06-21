<?php

namespace App\Providers; // Namespace de los proveedores de servicios

use Illuminate\Support\ServiceProvider; // Clase base para providers en Laravel

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registrar servicios de la aplicación.
     */
    public function register(): void
    {
        // Este método se usa para registrar bindings en el contenedor de servicios
        // (ej: inyección de dependencias, clases, servicios personalizados)
        // Aquí NO se ejecuta lógica, solo se registran servicios
    }

    /**
     * Inicializar (boot) servicios de la aplicación.
     */
    public function boot(): void
    {
        // Este método se ejecuta cuando todos los servicios ya están registrados
        // Aquí puedes:
        // - Definir macros
        // - Configurar comportamientos globales
        // - Registrar eventos
        // - Modificar configuraciones del framework
    }
}
