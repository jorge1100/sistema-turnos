<?php

namespace App\Models; // Namespace del modelo

use Illuminate\Database\Eloquent\Factories\HasFactory; // Permite usar factories (para pruebas y seeders)
use Illuminate\Database\Eloquent\Model; // Clase base de Eloquent

class Cliente extends Model
{
    use HasFactory; // Habilita el uso de factories para generar datos de prueba

    // Campos que se pueden guardar en la base de datos
    // (protección contra asignación masiva)
    protected $fillable = [
        'nombre'
    ];

    // Relación: un cliente puede tener muchos turnos
    public function turnos()
    {
        // Define una relación "uno a muchos"
        // Un cliente puede tener varios turnos asociados
        return $this->hasMany(Turno::class);
    }
}
