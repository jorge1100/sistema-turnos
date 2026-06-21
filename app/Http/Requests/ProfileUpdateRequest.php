<?php

namespace App\Http\Requests; // Namespace del FormRequest

use App\Models\User; // Modelo User (tabla users)
use Illuminate\Contracts\Validation\ValidationRule; // Tipo de reglas de validación
use Illuminate\Foundation\Http\FormRequest; // Clase base para crear requests personalizados
use Illuminate\Validation\Rule; // Permite reglas avanzadas de validación

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Obtener las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // El nombre es obligatorio, tipo string y con máximo de 255 caracteres
            'name' => ['required', 'string', 'max:255'],

            // Validaciones para el email
            'email' => [
                'required', // obligatorio
                'string', // tipo texto
                'lowercase', // se convierte a minúsculas automáticamente
                'email', // debe tener formato de email válido
                'max:255', // longitud máxima
                // Regla de unicidad:
                // el email debe ser único en la tabla users,
                // PERO se ignora el ID del usuario actual
                // (para permitir que el usuario mantenga su mismo email sin error)
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }
}
