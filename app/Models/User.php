<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ ESTA FALTABA
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}