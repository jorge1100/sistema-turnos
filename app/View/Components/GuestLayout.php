<?php

namespace App\View\Components; // Namespace de los componentes de vista

use Illuminate\View\Component; // Clase base para componentes Blade
use Illuminate\View\View; // Tipo de retorno para vistas

class GuestLayout extends Component
{
    /**
     * Obtener la vista que representa este componente.
     */
    public function render(): View
    {
        // Retorna la vista 'layouts.guest'
        // Este layout se usa generalmente para usuarios no autenticados (invitados)
        return view('layouts.guest');
    }
}