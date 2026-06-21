<?php

namespace App\Http\Controllers; // Namespace del controlador

use Illuminate\Http\Request; // Manejo de solicitudes HTTP

class DashboardController extends Controller
{
    public function index()
    {
        // Este método se encarga de mostrar el dashboard principal

        // Retorna la vista 'dashboard'
        // (archivo ubicado en resources/views/dashboard.blade.php)
        return view('dashboard');
    }
}
