<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    public function index()
    {
        $cajas = Caja::with('user')->get();
        return view('cajas.index', compact('cajas'));
    }

    public function create()
    {
        return view('cajas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        Caja::create([
            'nombre' => $request->nombre,
            'estado' => $request->estado ?? 1,
            'user_id' => auth()->id() // ✅ ✅ CLAVE
        ]);

        return redirect()->route('cajas.index');
    }

    public function edit(Caja $caja)
    {
        return view('cajas.edit', compact('caja'));
    }

    public function update(Request $request, Caja $caja)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $caja->update([
            'nombre' => $request->nombre,
            'estado' => $request->estado
        ]);

        return redirect()->route('cajas.index');
    }

    public function destroy(Caja $caja)
    {
        $caja->delete();
        return redirect()->route('cajas.index');
    }
}