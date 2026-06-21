<?php

namespace App\Models; // Namespace del modelo

use Illuminate\Database\Eloquent\Model; // Clase base de Eloquent

class Caja extends Model
{
    // Define qué campos pueden ser asignados masivamente (mass assignment)
    // Es una medida de seguridad en Laravel
    protected $fillable = ['nombre'];
}