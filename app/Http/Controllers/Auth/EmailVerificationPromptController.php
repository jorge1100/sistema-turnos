<?php

namespace App\Http\Controllers\Auth; // Define el namespace del controlador

use App\Http\Controllers\Controller; // Controlador base de Laravel
use Illuminate\Http\RedirectResponse; // Tipo de respuesta de redirección
use Illuminate\Http\Request; // Manejo de solicitudes HTTP
use Illuminate\View\View; // Tipo de respuesta para vistas

class EmailVerificationPromptController extends Controller
{
    /**
     * Mostrar la pantalla de solicitud de verificación de email.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        // Este método especial (__invoke) permite usar el controlador como si fuera una única acción

        return $request->user()->hasVerifiedEmail()
                    // Si el usuario ya verificó su email:
                    // lo redirige a la ruta 'dashboard'
                    ? redirect()->intended(route('dashboard', absolute: false))

                    // Si el usuario NO ha verificado su email:
                    // muestra la vista de verificación
                    : view('auth.verify-email');
    }
}
