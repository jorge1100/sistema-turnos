<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\TurnoApiController;

Route::get('/clientes', [ClienteApiController::class, 'index']);

Route::post('/turnos', [TurnoApiController::class, 'store']);
