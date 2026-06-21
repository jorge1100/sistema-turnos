<?php

namespace App\Http\Controllers\Auth; // Namespace del controlador

use App\Http\Controllers\Controller; // Controlador base de Laravel
use App\Models\User; // Modelo de usuario
use Illuminate\Auth\Events\PasswordReset; // Evento que se dispara al resetear contraseña
use Illuminate\Http\RedirectResponse; // Tipo de respuesta de redirección
use Illuminate\Http\Request; // Manejo de peticiones HTTP
use Illuminate\Support\Facades\Hash; // Facade para encriptar contraseñas
use Illuminate\Support\Facades\Password; // Facade para manejo de reseteo de contraseña
use Illuminate\Support\Str; // Utilidad para strings (ej: generar tokens)
use Illuminate\Validation\Rules; // Reglas de validación
use Illuminate\Validation\ValidationException; // Excepción de validación
use Illuminate\View\View; // Tipo de respuesta vista

class NewPasswordController extends Controller
{
    /**
     * Mostrar la vista para restablecer la contraseña.
     */
    public function create(Request $request): View
    {
        // Retorna la vista auth.reset-password y le pasa el request (contiene el token, email, etc.)
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Manejar la solicitud de nueva contraseña.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Valida los datos enviados desde el formulario
        $request->validate([
            'token' => ['required'], // Token enviado por email
            'email' => ['required', 'email'], // Email del usuario
            'password' => ['required', 'confirmed', Rules\Password::defaults()], 
            // Contraseña requerida, debe coincidir con password_confirmation y cumplir reglas de seguridad
        ]);

        // Aquí se intenta resetear la contraseña del usuario
        // Si es exitoso, se actualiza la contraseña en la base de datos
        // Si falla, se devuelve el error correspondiente
        $status = Password::reset(
            // Se pasan los datos necesarios para el reset
            $request->only('email', 'password', 'password_confirmation', 'token'),
            
            // Callback que se ejecuta si el reset es exitoso
            function (User $user) use ($request) {
                // Se actualiza la contraseña del usuario
                $user->forceFill([
                    // Se encripta la nueva contraseña antes de guardarla
                    'password' => Hash::make($request->password),
                    
                    // Se genera un nuevo token "remember me"
                    'remember_token' => Str::random(60),
                ])->save();

                // Se dispara un evento indicando que la contraseña fue restablecida
                event(new PasswordReset($user));
            }
        );

        // Si la contraseña se reseteó correctamente:
        return $status == Password::PASSWORD_RESET
                    // Redirige al login con un mensaje de estado
                    ? redirect()->route('login')->with('status', __($status))
                    
                    // Si hubo error:
                    // vuelve atrás con el email rellenado y muestra errores
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}