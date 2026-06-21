<?php

namespace App\Http\Controllers\Auth; // Define el namespace del controlador

use App\Http\Controllers\Controller; // Importa el controlador base de Laravel
use App\Http\Requests\Auth\LoginRequest; // Request personalizado para validar login
use Illuminate\Http\RedirectResponse; // Tipo de respuesta de redirección
use Illuminate\Http\Request; // Manejo de peticiones HTTP
use Illuminate\Support\Facades\Auth; // Facade para autenticación
use Illuminate\View\View; // Tipo de respuesta tipo vista

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar la vista de login.
     */
    public function create(): View
    {
        // Retorna la vista ubicada en resources/views/auth/login.blade.php
        return view('auth.login');
    }

    /**
     * Manejar una solicitud de autenticación (login).
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Ejecuta el método authenticate() definido en LoginRequest
        // Este normalmente valida credenciales (email/password)
        $request->authenticate();

        // Regenera la sesión para evitar ataques de fijación de sesión
        $request->session()->regenerate();

        // Redirige al usuario a la página que intentaba acceder,
        // o al dashboard si no hay una previa definida
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Cerrar sesión del usuario autenticado.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Cierra la sesión del usuario usando el guard 'web'
        Auth::guard('web')->logout();

        // Invalida la sesión actual
        $request->session()->invalidate();

        // Regenera el token CSRF para mayor seguridad
        $request->session()->regenerateToken();

        // Redirige al usuario a la página principal
        return redirect('/');
    }
}