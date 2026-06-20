<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // LISTAR Y BUSCAR
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $clientes = Cliente::query();

        if ($buscar) {
            $clientes->where('nombre', 'like', "%{$buscar}%");
        }

        return view('clientes.index', [
            'clientes' => $clientes->get()
        ]);
    }

    // CREAR
    public function create()
    {
        return view('clientes.create');
    }

    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        Cliente::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('clientes.index');
    }

    // EDITAR
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    // ACTUALIZAR
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $cliente->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('clientes.index');
    }

    // ELIMINAR
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}