<?php

namespace App\Http\Controllers\Auth; // Namespace del controlador

use App\Http\Controllers\Controller; // Controlador base de Laravel
use Illuminate\Http\RedirectResponse; // Tipo de respuesta: redirección
use Illuminate\Http\Request; // Manejo de peticiones HTTP
use Illuminate\Support\Facades\Hash; // Facade para encriptar contraseñas
use Illuminate\Validation\Rules\Password; // Reglas de validación para contraseñas

class PasswordController extends Controller
{
    /**
     * Actualizar la contraseña del usuario.
     */
    public function update(Request $request): RedirectResponse
    {
        // Valida los datos enviados usando un "error bag" llamado 'updatePassword'
        // Esto permite separar los errores si hay múltiples formularios en la misma vista
        $validated = $request->validateWithBag('updatePassword', [
            // Verifica que el usuario ingrese su contraseña actual correctamente
            'current_password' => ['required', 'current_password'],
            
            // Nueva contraseña:
            // requerida, con reglas por defecto de seguridad, y debe coincidir con password_confirmation
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // Actualiza la contraseña del usuario autenticado
        $request->user()->update([
            // Se encripta (hash) la nueva contraseña antes de guardarla
            'password' => Hash::make($validated['password']),
        ]);

        // Regresa a la página anterior con un mensaje de estado
        // que normalmente se usa para mostrar una notificación de éxito
        return back()->with('status', 'password-updated');
    }
}
