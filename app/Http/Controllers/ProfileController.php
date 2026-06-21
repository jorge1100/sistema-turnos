<?php

namespace App\Http\Controllers; // Namespace del controlador

use App\Http\Requests\ProfileUpdateRequest; // Request personalizado para validar actualización de perfil
use Illuminate\Http\RedirectResponse; // Tipo de respuesta: redirección
use Illuminate\Http\Request; // Manejo de solicitudes HTTP
use Illuminate\Support\Facades\Auth; // Facade para autenticación
use Illuminate\Support\Facades\Redirect; // Facade para redirecciones
use Illuminate\View\View; // Tipo de respuesta para vistas

class ProfileController extends Controller
{
    /**
     * Mostrar el formulario del perfil del usuario.
     */
    public function edit(Request $request): View
    {
        // Retorna la vista 'profile.edit' pasando el usuario autenticado
        return view('profile.edit', [
            'user' => $request->user(), // Usuario actualmente logueado
        ]);
    }

    /**
     * Actualizar la información del perfil del usuario.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Llena el modelo User con los datos validados del request
        $request->user()->fill($request->validated());

        // Verifica si el campo 'email' fue modificado
        if ($request->user()->isDirty('email')) {
            // Si el email cambió, se debe volver a verificar
            $request->user()->email_verified_at = null;
        }

        // Guarda los cambios en la base de datos
        $request->user()->save();

        // Redirige nuevamente al formulario con un mensaje de éxito
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Eliminar la cuenta del usuario.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Valida que el usuario ingrese su contraseña actual correctamente
        // usando un "error bag" llamado 'userDeletion'
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Obtiene el usuario autenticado
        $user = $request->user();

        // Cierra la sesión del usuario
        Auth::logout();

        // Elimina el usuario de la base de datos
        $user->delete();

        // Invalida la sesión actual por seguridad
        $request->session()->invalidate();

        // Regenera el token CSRF
        $request->session()->regenerateToken();

        // Redirige a la página principal
        return Redirect::to('/');
    }
}