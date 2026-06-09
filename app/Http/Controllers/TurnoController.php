<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Servicio;
use App\Models\Caja;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = auth()->user()
            ->turnos()
            ->with(['servicio', 'caja'])
            ->orderByRaw("
                CASE 
                    WHEN estado = 'pendiente' THEN 1
                    WHEN estado = 'en_atencion' THEN 2
                    WHEN estado = 'atendido' THEN 3
                    ELSE 4
                END
            ")
            ->orderByDesc('fecha')
            ->get();

        return view('turnos.index', compact('turnos'));
    }

    public function create()
    {
        $servicios = Servicio::all();
        return view('turnos.create', compact('servicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required',
            'nombre' => 'required'
        ]);

        $ultimo = Turno::latest()->first();
        $numero = $ultimo ? $ultimo->id + 1 : 1;

        Turno::create([
            'numero' => 'T' . str_pad($numero, 3, '0', STR_PAD_LEFT),
            'fecha' => now(),
            'estado' => 'pendiente',
            'user_id' => auth()->id(),
            'servicio_id' => $request->servicio_id,
            'caja_id' => null, // ✅ NO se asigna acá
            'nombre' => $request->nombre
        ]);

        return redirect()->route('turnos.index');
    }

    public function edit(Turno $turno)
    {
        $servicios = Servicio::all();
        return view('turnos.edit', compact('turno', 'servicios'));
    }

    public function update(Request $request, Turno $turno)
    {
        // ✅ CASO 1: EDITAR TURNO
        if ($request->has('nombre')) {

            $turno->update([
                'nombre' => $request->nombre,
                'servicio_id' => $request->servicio_id
            ]);

            return redirect()->route('turnos.index');
        }

        // ✅ BUSCAR CAJA DEL USUARIO (ACTIVA)
        $caja = Caja::where('user_id', auth()->id())
                    ->where('estado', 1)
                    ->first();

        if (!$caja) {
            return redirect()->route('turnos.index')
                ->with('error', 'No tienes una caja activa asignada');
        }

        // ✅ ATENDER
        if ($request->estado === 'en_atencion') {

            if ($turno->estado !== 'pendiente') {
                return redirect()->route('turnos.index');
            }

            $turno->estado = 'en_atencion';
            $turno->caja_id = $caja->id;
        }

        // ✅ FINALIZAR
        elseif ($request->estado === 'atendido') {

            if ($turno->caja_id != $caja->id) {
                return redirect()->route('turnos.index')
                    ->with('error', 'No puedes finalizar este turno');
            }

            $turno->estado = 'atendido';
        }

        $turno->save();

        return redirect()->route('turnos.index');
    }

    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect()->route('turnos.index');
    }

    public function pantalla()
    {
        $turno = Turno::where('estado', 'en_atencion')
            ->latest()
            ->first();

        return view('turnos.pantalla', compact('turno'));
    }
}