<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\TurnoApiController;
use App\Http\Controllers\ContactoController;



// Importación de controladores que se usarán en las rutas

// Página principal
Route::get('/', function () {
    return redirect()->route('login');
});
// Cuando se accede a la ruta raíz "/", redirige al login

// RUTAS CON LOGIN
Route::middleware(['auth'])->group(function () {
    // Agrupa rutas protegidas que requieren autenticación

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    // Muestra el panel principal

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    // Muestra el formulario de edición de perfil

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    // Actualiza los datos del perfil

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
    // Elimina la cuenta del usuario

    // CLIENTES (CRUD completo)
    Route::resource('clientes', ClienteController::class)->except(['show']);
    // Genera automáticamente rutas CRUD para clientes
    // Se excluye la ruta "show"

    // TURNOS (SIN SHOW PARA EVITAR ERROR)
    Route::resource('turnos', TurnoController::class);
    // CRUD completo para turnos

    // CAJAS
    Route::resource('cajas', CajaController::class)->except(['show']);
    // CRUD de cajas, sin método show

    Route::patch('/turnos/{turno}/atender', [TurnoController::class, 'atender'])->name('turnos.atender');
    // Ruta personalizada para cambiar estado del turno a "atendiendo"

    Route::patch('/turnos/{turno}/finalizar', [TurnoController::class, 'finalizar'])->name('turnos.finalizar');
    // Ruta personalizada para cambiar estado del turno a "finalizado"

    Route::view('/nosotros', 'nosotros.index')->name('nosotros');
    // Muestra una vista estática "nosotros"

    Route::view('/cv/jorge', 'cv.jorge')->name('cv.jorge');
    Route::view('/cv/jonathan', 'cv.jonathan')->name('cv.jonathan');
    Route::view('/cv/cristian', 'cv.cristian')->name('cv.cristian');
    // Rutas para mostrar los CVs sin usar controladores

    Route::get('/turnos/create/{cliente_id}', [TurnoController::class, 'create'])
        ->name('turnos.create.fromCliente');
    // Permite entrar al formulario de turno con cliente preseleccionado
    
    Route::get('/contacto', [ContactoController::class, 'index'])
        ->name('contacto');

    Route::post('/contacto', [ContactoController::class, 'enviar'])
        ->name('contacto.enviar');


});

// PANTALLA PUBLICA (sin login)
Route::get('/pantalla', [TurnoController::class, 'pantalla'])
    ->name('turnos.pantalla');
// Ruta pública para mostrar los turnos en pantalla

// AUTENTICACIÓN (login/register)
require __DIR__.'/auth.php';
// Incluye las rutas de autenticación (login, registro, etc.)

Route::get('/api/clientes', [ClienteApiController::class, 'index']);

Route::post('/api/turnos', [TurnoApiController::class, 'store']);