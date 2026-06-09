<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Caja extends Model
{
    protected $fillable = [
        'nombre',
        'estado',
        'user_id' // ✅ IMPORTANTE
    ];

    // ✅ RELACIÓN CON USUARIO
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ✅ RELACIÓN CON TURNOS
    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}