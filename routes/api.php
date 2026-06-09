<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Turno;

// ✅ LOGIN Y REGISTER
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// ✅ USUARIO LOGUEADO
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ✅ TURNOS PROTEGIDOS
Route::middleware('auth:sanctum')->get('/turnos', function (Request $request) {
    return $request->user()->turnos;
});

// ✅ LOGOUT
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);