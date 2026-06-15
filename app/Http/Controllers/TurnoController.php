<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Cliente;
use App\Models\Caja;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::with('cliente','caja')->latest()->get();
        return view('turnos.index', compact('turnos'));
    }
  
    public function create($cliente_id = null)
    {
        $clientes = Cliente::all();
        $cajas = Caja::all();

        $clienteSeleccionado = $cliente_id;

        return view('turnos.create', compact(
            'clientes',
            'cajas',
            'clienteSeleccionado'
        ));
    }

    public function store(Request $request)
    {
        $ultimo = Turno::max('numero');
        $numero = $ultimo ? $ultimo + 1 : 1;

        Turno::create([
            'numero' => $numero,
            'cliente_id' => $request->cliente_id,
            'caja_id' => $request->caja_id,
            'estado' => 'esperando',
            'fecha' => now()
        ]);

        return redirect()->route('turnos.index')
            ->with('success', '✅ Turno creado correctamente');
    }

    public function edit(Turno $turno)
    {
        return view('turnos.edit', compact('turno'));
    }

    public function update(Request $request, Turno $turno)
    {
        $turno->update([
            'estado' => $request->estado
        ]);

        return redirect()->route('turnos.index');
    }

    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect()->route('turnos.index');
    }

    public function atender(Turno $turno)
    {
        $turno->update([
            'estado' => 'atendiendo'
        ]);

        return back();
    }

    public function finalizar(Turno $turno)
    {
        $turno->update([
            'estado' => 'finalizado'
        ]);

        return back();
    }

    public function pantalla()
    {
        $actual = Turno::where('estado', 'atendiendo')
            ->latest()
            ->first();

        $historial = Turno::where('estado', 'atendiendo')
            ->orderByDesc('updated_at')
            ->take(4)
            ->get();

        return view('turnos.pantalla', compact('actual', 'historial'));
    }
}