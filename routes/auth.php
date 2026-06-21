<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
// Importa todos los controladores necesarios para autenticación

Route::middleware('guest')->group(function () {
    // Grupo de rutas solo accesibles para usuarios NO logueados

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    // Muestra formulario de registro

    Route::post('register', [RegisteredUserController::class, 'store']);
    // Guarda el nuevo usuario en la base de datos

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    // Muestra formulario de login

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    // Procesa login del usuario

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    // Muestra formulario para recuperar contraseña

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    // Envía email con enlace de recuperación

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    // Muestra formulario para ingresar nueva contraseña (con token)

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
    // Guarda la nueva contraseña
});

Route::middleware('auth')->group(function () {
    // Grupo de rutas solo para usuarios autenticados (logueados)

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    // Muestra aviso para verificar el email

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    // Verifica el email:
    // signed → valida link seguro
    // throttle → limita intentos (6 por minuto)

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
    // Reenvía correo de verificación (limitado)

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    // Muestra formulario para confirmar contraseña

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    // Procesa confirmación de contraseña

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    // Permite cambiar la contraseña

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    // Cierra sesión del usuario
});