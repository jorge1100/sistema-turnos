<?php

namespace App\Http\Requests\Auth; // Namespace del FormRequest

use Illuminate\Auth\Events\Lockout; // Evento que se dispara cuando hay bloqueo por intentos
use Illuminate\Contracts\Validation\ValidationRule; // Tipo de reglas de validación
use Illuminate\Foundation\Http\FormRequest; // Clase base para requests personalizados
use Illuminate\Support\Facades\Auth; // Facade para autenticación
use Illuminate\Support\Facades\RateLimiter; // Controlador de intentos (limite de intentos)
use Illuminate\Support\Str; // Utilidades para strings
use Illuminate\Validation\ValidationException; // Excepción de validación

class LoginRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        // Devuelve true → cualquier usuario puede intentar hacer login
        return true;
    }

    /**
     * Define las reglas de validación para el login.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // El email es obligatorio, string y debe tener formato válido
            'email' => ['required', 'string', 'email'],

            // La contraseña es obligatoria y tipo string
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Intenta autenticar las credenciales del request.
     *
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        // Verifica que no se haya excedido el límite de intentos
        $this->ensureIsNotRateLimited();

        // Intenta autenticar al usuario con email y password
        // $this->boolean('remember') permite recordar la sesión (checkbox "remember me")
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {

            // Si falla, suma un intento al contador (RateLimiter)
            RateLimiter::hit($this->throttleKey());

            // Lanza error de validación
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'), // Mensaje tipo: "credenciales incorrectas"
            ]);
        }

        // Si el login es exitoso, limpia el contador de intentos fallidos
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Asegura que la solicitud de login no esté bloqueada por demasiados intentos.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        // Verifica si se superaron los intentos permitidos (5 intentos)
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return; // si no supera el límite, continúa normal
        }

        // Dispara el evento de bloqueo (Lockout)
        event(new Lockout($this));

        // Obtiene los segundos restantes para poder intentar nuevamente
        $seconds = RateLimiter::availableIn($this->throttleKey());

        // Lanza una excepción con mensaje indicando el tiempo de espera
        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds, // segundos restantes
                'minutes' => ceil($seconds / 60), // minutos aproximados
            ]),
        ]);
    }

    /**
     * Genera la clave única para limitar intentos (rate limit).
     */
    public function throttleKey(): string
    {
        // Combina el email en minúsculas + la IP del usuario
        // transliterate elimina caracteres especiales
        return Str::transliterate(
            Str::lower($this->string('email')) . '|' . $this->ip()
        );
    }
}