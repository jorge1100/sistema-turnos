<?php

namespace App\Http\Controllers; // Namespace del controlador

use App\Models\Turno; // Modelo Turno
use App\Models\Cliente; // Modelo Cliente
use App\Models\Caja; // Modelo Caja
use Illuminate\Http\Request; // Manejo de solicitudes HTTP
use Illuminate\Support\Facades\Http;

class TurnoController extends Controller
{
    public function index()
    {
        // Obtiene todos los turnos con sus relaciones:
        // 'cliente' y 'caja' (Eager Loading para evitar consultas extra)
        // latest() ordena por fecha de creación descendente
        $turnos = Turno::with('cliente','caja')->latest()->get();

        // Retorna la vista con la lista de turnos
        return view('turnos.index', compact('turnos'));
    }
  
    public function create($cliente_id = null)
    {
        // Obtiene todos los clientes para mostrarlos en un select
        $clientes = Cliente::all();

        // Obtiene todas las cajas disponibles
        $cajas = Caja::all();

        // Guarda el cliente seleccionado (opcional)
        // Esto sirve para cuando vienes desde cliente y quieres autoseleccionarlo
        $clienteSeleccionado = $cliente_id;

        // Retorna la vista con los datos necesarios
        return view('turnos.create', compact(
            'clientes',
            'cajas',
            'clienteSeleccionado'
        ));
    }

    public function store(Request $request)
    {
        // Obtiene el número máximo actual de turnos
        $ultimo = Turno::max('numero');

        // Genera el siguiente número de turno (autoincremental manual)
        $numero = $ultimo ? $ultimo + 1 : 1;

        // Crea un nuevo turno con los datos enviados
        Turno::create([
            'numero' => $numero, // Número correlativo del turno
            'cliente_id' => $request->cliente_id, // Cliente asociado
            'caja_id' => $request->caja_id, // Caja asignada
            'estado' => 'esperando', // Estado inicial del turno
            'fecha' => now() // Fecha actual
        ]);

        // Redirige al listado con mensaje de éxito
        return redirect()->route('turnos.index')
            ->with('success', '✅ Turno creado correctamente');
    }

    public function edit(Turno $turno)
    {
        // Muestra el formulario de edición del turno
        // Laravel obtiene automáticamente el turno por Route Model Binding
        return view('turnos.edit', compact('turno'));
    }

    public function update(Request $request, Turno $turno)
    {
        // Actualiza el estado del turno (esperando, atendiendo, finalizado, etc.)
        $turno->update([
            'estado' => $request->estado
        ]);

        // Redirige al listado
        return redirect()->route('turnos.index');
    }

    public function destroy(Turno $turno)
    {
        // Elimina el turno de la base de datos
        $turno->delete();

        // Redirige al listado
        return redirect()->route('turnos.index');
    }

    public function atender(Turno $turno)
    {
        // Cambia el estado del turno a "atendiendo"
        $turno->update([
            'estado' => 'atendiendo'
        ]);

        // Vuelve a la página anterior
        return back();
    }

    public function finalizar(Turno $turno)
    {
        // Cambia el estado del turno a "finalizado"
        $turno->update([
            'estado' => 'finalizado'
        ]);

        // Vuelve a la página anterior
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

        $hora = '--:--:--';
        $fecha = '--/--/----';

        try {

            $response = Http::timeout(10)
                ->get('https://timeapi.io/api/Time/current/zone?timeZone=America/Argentina/Buenos_Aires');

            if ($response->successful()) {

                $datos = $response->json();

                $fechaHora = new \DateTime($datos['dateTime']);

                $hora = $fechaHora->format('H:i:s');
                $fecha = $fechaHora->format('d/m/Y');
            }

        } catch (\Exception $e) {

            logger($e->getMessage());

        }

        return view(
            'turnos.pantalla',
            compact(
                'actual',
                'historial',
                'hora',
                'fecha'
            )
        );
    } 
}