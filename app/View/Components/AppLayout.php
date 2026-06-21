<?php

namespace App\View\Components; // Namespace de los componentes de vista

use Illuminate\View\Component; // Clase base para crear componentes Blade
use Illuminate\View\View; // Tipo de retorno para vistas

class AppLayout extends Component
{
    /**
     * Obtener la vista que representa este componente.
     */
    public function render(): View
    {
        // Retorna la vista 'layouts.app'
        // Esta vista es el layout principal (estructura base) de la aplicación
        return view('layouts.app');
    }
}
