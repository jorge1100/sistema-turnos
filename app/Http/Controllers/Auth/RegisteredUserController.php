<?php

namespace App\Http\Controllers\Auth; // Namespace del controlador

use App\Http\Controllers\Controller; // Controlador base de Laravel
use App\Models\User; // Modelo User (tabla users)
use Illuminate\Auth\Events\Registered; // Evento que se lanza al registrar un usuario
use Illuminate\Http\RedirectResponse; // Tipo de respuesta: redirección
use Illuminate\Http\Request; // Manejo de solicitudes HTTP
use Illuminate\Support\Facades\Auth; // Facade para autenticación
use Illuminate\Support\Facades\Hash; // Para encriptar contraseñas
use Illuminate\Validation\Rules; // Reglas de validación
use Illuminate\Validation\ValidationException; // Excepción de validación
use Illuminate\View\View; // Tipo de respuesta de vista

class RegisteredUserController extends Controller
{
    /**
     * Mostrar la vista de registro.
     */
    public function create(): View
    {
        // Retorna la vista ubicada en resources/views/auth/register.blade.php
        return view('auth.register');
    }

    /**
     * Manejar la solicitud de registro de un nuevo usuario.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Valida los datos enviados desde el formulario de registro
        $request->validate([
            // Nombre obligatorio, tipo string, máximo 255 caracteres
            'name' => ['required', 'string', 'max:255'],

            // Email obligatorio, en minúsculas, formato válido, único en la tabla users
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],

            // Contraseña obligatoria, confirmada (password_confirmation),
            // y con reglas de seguridad por defecto de Laravel
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Crea un nuevo usuario en la base de datos
        $user = User::create([
            'name' => $request->name, // Asigna el nombre ingresado
            'email' => $request->email, // Asigna el email ingresado
            // Encripta la contraseña antes de guardarla
            'password' => Hash::make($request->password),
        ]);

        // Dispara el evento de usuario registrado
        // (por ejemplo, para enviar verificación de email)
        event(new Registered($user));

        // Inicia sesión automáticamente con el usuario recién registrado
        Auth::login($user);

        // Redirige al usuario al dashboard
        return redirect(route('dashboard', absolute: false));
    }
}