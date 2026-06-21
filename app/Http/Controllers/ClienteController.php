<?php

namespace App\Http\Controllers; // Namespace del controlador

use App\Models\Cliente; // Modelo Cliente (tabla clientes)
use Illuminate\Http\Request; // Manejo de solicitudes HTTP

class ClienteController extends Controller
{
    // ============================
    // LISTAR + BUSCAR + PAGINAR
    // ============================
    public function index(Request $request)
    {
        // Obtiene el valor del input 'buscar'
        $buscar = $request->input('buscar');

        // Inicia una consulta base sobre la tabla clientes
        $query = Cliente::query();

        // Si el usuario escribió algo en el buscador
        if ($buscar) {
            // Filtra por nombre usando LIKE (búsqueda parcial)
            $query->where('nombre', 'like', "%{$buscar}%");
        }

        // 🔥 IMPORTANTE:
        // paginate(15) -> limita a 15 registros por página
        // withQueryString() -> mantiene el valor del buscador al cambiar de página
        $clientes = $query->paginate(10)->withQueryString();

        // Retorna la vista enviando los clientes paginados
        return view('clientes.index', compact('clientes'));
    }


    // ============================
    // MOSTRAR FORMULARIO DE CREACIÓN
    // ============================
    public function create()
    {
        // Muestra el formulario para crear cliente
        return view('clientes.create');
    }


    // ============================
    // GUARDAR NUEVO CLIENTE
    // ============================
    public function store(Request $request)
    {
        // Valida que el nombre sea obligatorio
        $request->validate([
            'nombre' => 'required'
        ]);

        // Crea el cliente en la base de datos
        Cliente::create([
            'nombre' => $request->nombre
        ]);

        // Redirige al listado
        return redirect()->route('clientes.index');
    }


    // ============================
    // MOSTRAR FORMULARIO DE EDICIÓN
    // ============================
    public function edit(Cliente $cliente)
    {
        // Laravel inyecta automáticamente el cliente
        return view('clientes.edit', compact('cliente'));
    }


    // ============================
    // ACTUALIZAR CLIENTE
    // ============================
    public function update(Request $request, Cliente $cliente)
    {
        // Validación
        $request->validate([
            'nombre' => 'required'
        ]);

        // Actualiza el registro
        $cliente->update([
            'nombre' => $request->nombre
        ]);

        // Redirige al listado
        return redirect()->route('clientes.index');
    }


    // ============================
    // ELIMINAR CLIENTE
    // ============================
    public function destroy(Cliente $cliente)
    {
        // Elimina el cliente
        $cliente->delete();

        // Redirige al listado
        return redirect()->route('clientes.index');
    }
}