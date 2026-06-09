<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;
use App\Models\Caja;
use App\Models\User;

class Turno extends Model
{
    protected $fillable = [
        'numero',
        'fecha',
        'estado',
        'user_id',
        'servicio_id',
        'caja_id',
        'nombre'
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function caja()
    {
        return $this->belongsTo(Caja::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function historiales()
    {
        return $this->hasMany(Historial::class);
    }

}