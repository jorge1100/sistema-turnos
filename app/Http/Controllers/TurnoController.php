<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Cliente;
use App\Models\Caja;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    // LISTAR TURNOS
    public function index()
    {
        $turnos = Turno::with('cliente', 'caja')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('turnos.index', compact('turnos'));
    }

    // FORM CREAR
    public function create()
    {
        $clientes = Cliente::all();
        $cajas = Caja::all();

        return view('turnos.create', compact('clientes', 'cajas'));
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'caja_id' => 'required|exists:cajas,id',
        ]);

        // número automático
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

    // MOSTRAR (EVITA ERROR)
    public function show(Turno $turno)
    {
        return redirect()->route('turnos.index');
    }

    // FORM EDITAR
    public function edit(Turno $turno)
    {
        $clientes = Cliente::all();
        $cajas = Caja::all();

        return view('turnos.edit', compact('turno', 'clientes', 'cajas'));
    }

    // ACTUALIZAR
    public function update(Request $request, Turno $turno)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'caja_id' => 'required|exists:cajas,id',
            'estado' => 'required|in:esperando,atendiendo,finalizado',
        ]);

        $turno->update([
            'cliente_id' => $request->cliente_id,
            'caja_id' => $request->caja_id,
            'estado' => $request->estado,
        ]);

        return redirect()->route('turnos.index')
            ->with('success', '✏️ Turno actualizado correctamente');
    }

    // ELIMINAR
    public function destroy(Turno $turno)
    {
        $turno->delete();

        return redirect()->route('turnos.index')
            ->with('success', '❌ Turno eliminado correctamente');
    }

    // PANTALLA EN VIVO
    public function pantalla()
    {
        $turnos = Turno::with('caja')
            ->where('estado', '!=', 'finalizado')
            ->orderBy('numero', 'asc')
            ->get();

        return view('turnos.pantalla', compact('turnos'));
    }
}