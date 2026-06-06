<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CajaController;



Route::get('/', function () {
    return view('home');
})->name('home');


Route::resource(
    'turnos', TurnoController::class
    );

Route::resource(
    'servicios', ServicioController::class
    );

Route::resource(
    'cajas', CajaController::class
    );

Route::get('pantalla', [TurnoController::class, 'pantalla'])
    ->name('turnos.pantalla');





