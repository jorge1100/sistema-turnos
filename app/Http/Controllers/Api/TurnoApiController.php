<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoApiController extends Controller
{
    public function store(Request $request)
    {
        $turno = Turno::create([
            'cliente_id' => $request->cliente_id,
            'caja_id' => $request->caja_id,
            'numero' => Turno::max('numero') + 1,
            'estado' => 'esperando',
            'fecha' => now()
        ]);

        return response()->json([
            'mensaje' => 'Turno creado',
            'turno' => $turno
        ]);
    }
}