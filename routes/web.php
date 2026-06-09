<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\WebAuthController;

//////////////////////////////////////////////////
// 🔐 LOGIN
//////////////////////////////////////////////////

Route::get('/login', [WebAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [WebAuthController::class, 'login']);
Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

//////////////////////////////////////////////////
// 🔒 TODO PROTEGIDO
//////////////////////////////////////////////////

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('home');

    // ✅ TURNOS (COMPLETO)
    Route::resource('turnos', TurnoController::class);

    // ✅ SERVICIOS
    Route::resource('servicios', ServicioController::class);

    // ✅ CAJAS
    Route::resource('cajas', CajaController::class);

    // ✅ PANTALLA
    Route::get('pantalla', [TurnoController::class, 'pantalla'])
        ->name('turnos.pantalla');
});

//////////////////////////////////////////////////
// 📊 DASHBOARD
//////////////////////////////////////////////////

Route::get('/dashboard', function () {

    $total = \App\Models\Turno::count();
    $pendientes = \App\Models\Turno::where('estado', 'pendiente')->count();
    $atendiendo = \App\Models\Turno::where('estado', 'en_atencion')->count();
    $finalizados = \App\Models\Turno::where('estado', 'atendido')->count();

    return view('dashboard', compact('total', 'pendientes', 'atendiendo', 'finalizados'));

})->name('dashboard');

// ✅ REGISTRO
Route::get('/register', [WebAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [WebAuthController::class, 'register']);
