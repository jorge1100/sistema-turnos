<?php

namespace App\Http\Controllers\Auth; // Define el namespace del controlador

use App\Http\Controllers\Controller; // Controlador base de Laravel
use Illuminate\Http\RedirectResponse; // Tipo de respuesta: redirección
use Illuminate\Http\Request; // Manejo de solicitudes HTTP
use Illuminate\Support\Facades\Auth; // Facade para autenticación
use Illuminate\Validation\ValidationException; // Excepción para errores de validación
use Illuminate\View\View; // Tipo de respuesta para vistas

class ConfirmablePasswordController extends Controller
{
    /**
     * Muestra la vista para confirmar la contraseña.
     */
    public function show(): View
    {
        // Retorna la vista ubicada en resources/views/auth/confirm-password.blade.php
        return view('auth.confirm-password');
    }

    /**
     * Confirmar la contraseña del usuario.
     */
    public function store(Request $request): RedirectResponse
    {
        // Verifica si la contraseña ingresada es correcta
        // usando el guard 'web' (autenticación estándar de Laravel)
        if (! Auth::guard('web')->validate([
            // Se usa el email del usuario actualmente autenticado
            'email' => $request->user()->email,
            // Se compara con la contraseña enviada en el formulario
            'password' => $request->password,
        ])) {
            // Si la validación falla, lanza una excepción de validación
            // y devuelve un mensaje de error en el campo 'password'
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        // Si la contraseña es correcta, guarda en la sesión
        // la fecha y hora (timestamp) de la confirmación
        $request->session()->put('auth.password_confirmed_at', time());

        // Redirige al usuario a la página que intentaba acceder,
        // o al dashboard si no hay una previa definida
        return redirect()->intended(route('dashboard', absolute: false));
    }
}