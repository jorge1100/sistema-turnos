<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    public function index()
    {
        $cajas = Caja::all();
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

        Caja::create($request->all());

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

        $caja->update($request->all());

        return redirect()->route('cajas.index');
    }

    public function destroy(Caja $caja)
    {
        $caja->delete();

        return redirect()->route('cajas.index');
    }
}