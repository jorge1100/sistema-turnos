<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Campos que se pueden guardar en la base de datos
    protected $fillable = [
        'nombre'
    ];

    // Relación: un cliente puede tener muchos turnos
    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
