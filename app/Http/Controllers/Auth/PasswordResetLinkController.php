<?php

namespace App\Http\Controllers\Auth; // Namespace del controlador

use App\Http\Controllers\Controller; // Controlador base de Laravel
use Illuminate\Http\RedirectResponse; // Tipo de respuesta: redirección
use Illuminate\Http\Request; // Manejo de solicitudes HTTP
use Illuminate\Support\Facades\Password; // Facade para gestionar recuperación de contraseña
use Illuminate\Validation\ValidationException; // Excepción para errores de validación
use Illuminate\View\View; // Tipo de respuesta tipo vista

class PasswordResetLinkController extends Controller
{
    /**
     * Mostrar la vista para solicitar el enlace de recuperación de contraseña.
     */
    public function create(): View
    {
        // Retorna la vista ubicada en resources/views/auth/forgot-password.blade.php
        return view('auth.forgot-password');
    }

    /**
     * Procesar la solicitud de envío del enlace de recuperación.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Valida que el campo email esté presente y tenga formato válido
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Intenta enviar el enlace de recuperación de contraseña al email proporcionado
        // Este método genera un token y envía un correo al usuario
        $status = Password::sendResetLink(
            // Se envía solo el email al método
            $request->only('email')
        );

        // Si el enlace fue enviado correctamente:
        return $status == Password::RESET_LINK_SENT
                    // Vuelve a la página anterior con un mensaje de éxito
                    ? back()->with('status', __($status))
                    
                    // Si hubo un error:
                    // vuelve atrás, mantiene el email en el formulario y muestra el error
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}