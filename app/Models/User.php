<?php

namespace App\Models; // Namespace del modelo

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory; // Factory para generar usuarios (testing/seeders)
use Illuminate\Database\Eloquent\Attributes\Fillable; // Atributo moderno para definir campos asignables
use Illuminate\Database\Eloquent\Attributes\Hidden; // Atributo para ocultar campos sensibles
use Illuminate\Database\Eloquent\Factories\HasFactory; // Permite usar factories
use Illuminate\Foundation\Auth\User as Authenticatable; // Clase base para usuarios autenticables
use Illuminate\Notifications\Notifiable; // Permite enviar notificaciones (email, etc.)

#[Fillable(['name', 'email', 'password'])] 
// Define los campos que se pueden asignar masivamente (equivalente a $fillable)

#[Hidden(['password', 'remember_token'])] 
// Oculta estos campos cuando el modelo se convierte a array o JSON (seguridad)

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable; 
    // HasFactory: permite crear usuarios de prueba
    // Notifiable: permite enviar notificaciones (ej: verificación de email, reset password)

    /**
     * Define cómo se deben transformar (cast) algunos atributos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Convierte este campo automáticamente a objeto tipo fecha (Carbon)
            'email_verified_at' => 'datetime',

            // Hace hash automático de la contraseña al guardarla
            'password' => 'hashed',
        ];
    }
}