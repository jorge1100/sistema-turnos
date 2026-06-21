<?php

namespace App\Http\Controllers\Auth; // Define el namespace del controlador

use App\Http\Controllers\Controller; // Controlador base de Laravel
use Illuminate\Http\RedirectResponse; // Tipo de respuesta de redirección
use Illuminate\Http\Request; // Clase para manejar la petición HTTP

class EmailVerificationNotificationController extends Controller
{
    /**
     * Enviar una nueva notificación de verificación de email.
     */
    public function store(Request $request): RedirectResponse
    {
        // Verifica si el usuario ya tiene su email verificado
        if ($request->user()->hasVerifiedEmail()) {
            // Si ya está verificado, lo redirige al dashboard
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // Si NO está verificado, envía una notificación de verificación por correo
        // Esto manda un email con un enlace de verificación
        $request->user()->sendEmailVerificationNotification();

        // Regresa a la página anterior y envía un mensaje de estado
        // que normalmente se usa para mostrar un aviso en la vista
        return back()->with('status', 'verification-link-sent');
    }
}
