<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WebAuthController extends Controller
{
    // ✅ MOSTRAR LOGIN
    public function showLogin()
    {
        return view('auth.login');
    }

    // ✅ LOGIN
    public function login(Request $request)
    {
        $credenciales = $request->only('email', 'password');

        if (Auth::attempt($credenciales)) {
            return redirect()->route('home');
        }

        return back()->with('error', 'Credenciales incorrectas');
    }

    // ✅ LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // ✅ MOSTRAR FORM REGISTRO
    public function showRegister()
    {
        return view('auth.register');
    }

    // ✅ REGISTRAR USUARIO
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')
            ->with('success', 'Usuario creado correctamente');
    }
}
