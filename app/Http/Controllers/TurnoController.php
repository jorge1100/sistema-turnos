<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Servicio;
use App\Models\Caja;
use App\Models\Historial;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::with(['servicio', 'caja'])->get();
        return view('turnos.index', compact('turnos'));
    }

    public function create()
    {
        $servicios = Servicio::all();
        $cajas = Caja::all();
        return view('turnos.create', compact('servicios', 'cajas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required',
        ]);

        $ultimo = Turno::latest()->first();
        $numero = $ultimo ? $ultimo->id + 1 : 1;

        $turno = Turno::create([
            'numero' => 'T' . str_pad($numero, 3, '0', STR_PAD_LEFT),
            'fecha' => now(),
            'estado' => 'pendiente',
            'user_id' => 1, // después podés usar auth()->id()
            'servicio_id' => $request->servicio_id,
            'caja_id' => null
        ]);

        // ✅ Guardar historial inicial
        Historial::create([
            'turno_id' => $turno->id,
            'estado' => 'pendiente',
            'fecha_hora' => now()
        ]);

        return redirect()->route('turnos.index');
    }

    public function show(Turno $turno)
    {
        return view('turnos.show', compact('turno'));
    }

    public function edit(Turno $turno)
    {
        $servicios = Servicio::all();
        $cajas = Caja::all();
        return view('turnos.edit', compact('turno', 'servicios', 'cajas'));
    }

    public function update(Request $request, Turno $turno)
    {
        $turno->update([
            'estado' => $request->estado,
            'caja_id' => $request->caja_id
        ]);

        // ✅ Guardar historial
        Historial::create([
            'turno_id' => $turno->id,
            'estado' => $request->estado,
            'fecha_hora' => now()
        ]);

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