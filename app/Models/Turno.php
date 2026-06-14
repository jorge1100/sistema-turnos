<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = [
        'numero',
        'cliente_id',
        'caja_id',
        'estado',
        'fecha'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function caja()
    {
        return $this->belongsTo(Caja::class);
    }
}