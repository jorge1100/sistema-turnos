<?php

namespace App\Http\Controllers; // Namespace donde se encuentra este controlador

use App\Models\Turno; // Importa el modelo Turno
use App\Models\Cliente; // Importa el modelo Cliente
use App\Models\Caja; // Importa el modelo Caja
use Illuminate\Http\Request; // Permite manejar solicitudes HTTP
use Illuminate\Support\Facades\Http; // Permite consumir APIs externas

class TurnoController extends Controller
{
    /**
     * Mostrar listado de turnos
     */
    public function index()
    {
        // Obtiene todos los turnos junto con los datos
        // relacionados de cliente y caja para evitar
        // consultas adicionales (Eager Loading)
        $turnos = Turno::with('cliente','caja')->latest()->get();

        // Envía los turnos a la vista index
        return view('turnos.index', compact('turnos'));
    }

    /**
     * Mostrar formulario de creación de turno
     */
    public function create($cliente_id = null)
    {
        // Obtiene todos los clientes registrados
        $clientes = Cliente::all();

        // Obtiene todas las cajas registradas
        $cajas = Caja::all();

        // Guarda el ID del cliente seleccionado
        // para preseleccionarlo en el formulario
        $clienteSeleccionado = $cliente_id;

        // Retorna la vista create enviando
        // clientes, cajas y cliente seleccionado
        return view('turnos.create', compact(
            'clientes',
            'cajas',
            'clienteSeleccionado'
        ));
    }

    /**
     * Guardar un nuevo turno
     */
    public function store(Request $request)
    {
        // Busca el número de turno más alto registrado
        $ultimo = Turno::max('numero');

        // Genera el siguiente número correlativo
        // Si no existen turnos comienza desde 1
        $numero = $ultimo ? $ultimo + 1 : 1;

        // Crea un nuevo registro de turno
        Turno::create([

            // Número correlativo generado automáticamente
            'numero' => $numero,

            // Cliente seleccionado en el formulario
            'cliente_id' => $request->cliente_id,

            // Caja seleccionada en el formulario
            'caja_id' => $request->caja_id,

            // Estado inicial del turno
            'estado' => 'esperando',

            // Fecha y hora actual del sistema
            'fecha' => now()
        ]);

        // Redirecciona al listado de turnos
        // mostrando un mensaje de éxito
        return redirect()->route('turnos.index')
            ->with('success', '✅ Turno creado correctamente');
    }

    /**
     * Mostrar formulario para editar un turno
     */
    public function edit(Turno $turno)
    {
        // Laravel obtiene automáticamente el turno
        // utilizando Route Model Binding
        return view('turnos.edit', compact('turno'));
    }

    /**
     * Actualizar datos de un turno
     */
    public function update(Request $request, Turno $turno)
    {
        // Actualiza únicamente el estado del turno
        $turno->update([
            'estado' => $request->estado
        ]);

        // Regresa al listado de turnos
        return redirect()->route('turnos.index');
    }

    /**
     * Eliminar un turno
     */
    public function destroy(Turno $turno)
    {
        // Elimina el registro de la base de datos
        $turno->delete();

        // Redirecciona nuevamente al listado
        return redirect()->route('turnos.index');
    }

    /**
     * Cambiar turno a estado "atendiendo"
     */
    public function atender(Turno $turno)
    {
        // Actualiza el estado del turno
        $turno->update([
            'estado' => 'atendiendo'
        ]);

        // Regresa a la página anterior
        return back();
    }

    /**
     * Cambiar turno a estado "finalizado"
     */
    public function finalizar(Turno $turno)
    {
        // Actualiza el estado del turno
        $turno->update([
            'estado' => 'finalizado'
        ]);

        // Regresa a la página anterior
        return back();
    }

    /**
     * Mostrar pantalla pública de turnos
     */
    public function pantalla()
    {
        // Obtiene el último turno que se encuentra
        // actualmente en estado "atendiendo"
        $actual = Turno::where('estado', 'atendiendo')
            ->latest()
            ->first();

        // Obtiene un historial de los últimos
        // 4 turnos atendidos ordenados por fecha
        // de actualización descendente
        $historial = Turno::where('estado', 'atendiendo')
            ->orderByDesc('updated_at')
            ->take(4)
            ->get();

        // Valores por defecto en caso de que
        // falle el consumo de la API
        $hora = '--:--:--';
        $fecha = '--/--/----';

        try {

            // Realiza una petición HTTP a la API
            // TimeAPI para obtener la hora oficial
            // de Buenos Aires
            $response = Http::timeout(10)
                ->get('https://timeapi.io/api/Time/current/zone?timeZone=America/Argentina/Buenos_Aires');

            // Verifica que la respuesta sea exitosa
            if ($response->successful()) {

                // Convierte la respuesta JSON en array
                $datos = $response->json();

                // Convierte la fecha recibida a objeto DateTime
                $fechaHora = new \DateTime($datos['dateTime']);

                // Formatea la hora en formato HH:MM:SS
                $hora = $fechaHora->format('H:i:s');

                // Formatea la fecha en formato DD/MM/AAAA
                $fecha = $fechaHora->format('d/m/Y');
            }

        } catch (\Exception $e) {

            // Si ocurre algún error se registra
            // en el archivo de logs de Laravel
            logger($e->getMessage());

        }

        // Retorna la vista de pantalla pública
        // enviando el turno actual, historial,
        // hora y fecha
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