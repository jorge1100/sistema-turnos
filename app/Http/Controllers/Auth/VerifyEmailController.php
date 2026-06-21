<?php

namespace App\Http\Controllers\Auth; // Namespace del controlador

use App\Http\Controllers\Controller; // Controlador base de Laravel
use Illuminate\Auth\Events\Verified; // Evento que se dispara cuando el email es verificado
use Illuminate\Foundation\Auth\EmailVerificationRequest; // Request especial para verificación de email
use Illuminate\Http\RedirectResponse; // Tipo de respuesta: redirección

class VerifyEmailController extends Controller
{
    /**
     * Marcar el email del usuario autenticado como verificado.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Método __invoke: permite usar este controlador como una acción única en la ruta

        // Verifica si el usuario ya tiene su email validado
        if ($request->user()->hasVerifiedEmail()) {
            // Si ya está verificado, lo redirige al dashboard
            // agregando el parámetro ?verified=1 en la URL
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        // Intenta marcar el email del usuario como verificado
        if ($request->user()->markEmailAsVerified()) {
            // Si se logra verificar, dispara el evento Verified
            // (puede usarse para logs, notificaciones, etc.)
            event(new Verified($request->user()));
        }

        // Redirige al dashboard con un parámetro en la URL indicando verificación exitosa
        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
