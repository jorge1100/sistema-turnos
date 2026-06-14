<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\CajaController;

// Página principal

Route::get('/', function () {
    return redirect()->route('login');
});

// RUTAS CON LOGIN
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // CLIENTES (CRUD completo)
    Route::resource('clientes', ClienteController::class)->except(['show']);

    // TURNOS (SIN SHOW PARA EVITAR ERROR)
    Route::resource('turnos', TurnoController::class)->except(['show']);

    Route::resource('cajas', CajaController::class)->except(['show']);

    });

// PANTALLA PUBLICA (sin login)
Route::get('/pantalla', [TurnoController::class, 'pantalla'])
    ->name('turnos.pantalla');

// AUTENTICACIÓN (login/register)
require __DIR__.'/auth.php';