<?php

namespace App\Models; // Namespace del modelo

use Illuminate\Database\Eloquent\Model; // Clase base de Eloquent

class Turno extends Model
{
    // Define los campos que se pueden asignar masivamente (mass assignment)
    protected $fillable = [
        'numero',     // Número del turno (correlativo)
        'cliente_id', // ID del cliente asociado
        'caja_id',    // ID de la caja asignada
        'estado',     // Estado del turno (esperando, atendiendo, finalizado)
        'fecha'       // Fecha de creación del turno
    ];

    public function cliente()
    {
        // Define una relación inversa "muchos a uno"
        // Un turno pertenece a un solo cliente
        return $this->belongsTo(Cliente::class);
    }

    public function caja()
    {
        // Define una relación inversa "muchos a uno"
        // Un turno pertenece a una sola caja
        return $this->belongsTo(Caja::class);
    }
}