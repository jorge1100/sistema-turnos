<?php

namespace App\Http\Controllers; // Namespace del controlador

use App\Models\Caja; // Modelo Caja (tabla cajas en la base de datos)
use Illuminate\Http\Request; // Manejo de solicitudes HTTP

class CajaController extends Controller
{
    public function index()
    {
        // Obtiene todos los registros de la tabla 'cajas'
        $cajas = Caja::all();

        // Retorna la vista 'cajas.index' y pasa la variable $cajas
        return view('cajas.index', compact('cajas'));
    }

    public function create()
    {
        // Muestra el formulario para crear una nueva caja
        return view('cajas.create');
    }

    public function store(Request $request)
    {
        // Valida que el campo 'nombre' sea obligatorio
        $request->validate([
            'nombre' => 'required'
        ]);

        // Crea una nueva caja con todos los datos enviados en el request
        // (debe estar habilitado el fillable en el modelo Caja)
        Caja::create($request->all());

        // Redirige a la lista de cajas
        return redirect()->route('cajas.index');
    }

    public function edit(Caja $caja)
    {
        // Muestra el formulario de edición de una caja específica
        // Laravel automáticamente inyecta el modelo por Route Model Binding
        return view('cajas.edit', compact('caja'));
    }

    public function update(Request $request, Caja $caja)
    {
        // Valida que el campo 'nombre' sea obligatorio
        $request->validate([
            'nombre' => 'required'
        ]);

        // Actualiza la caja con los datos enviados en el request
        $caja->update($request->all());

        // Redirige nuevamente a la lista de cajas
        return redirect()->route('cajas.index');
    }

    public function destroy(Caja $caja)
    {
        // Elimina la caja de la base de datos
        $caja->delete();

        // Redirige a la lista de cajas
        return redirect()->route('cajas.index');
    }
}