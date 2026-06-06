<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historiales';

    protected $fillable = [
        'turno_id',
        'estado',
        'fecha_hora'
    ];

    // 🔗 RELACIÓN CON TURNO
    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
}