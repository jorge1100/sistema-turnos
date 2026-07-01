<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|min:10'
        ]);

        $datos = [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'mensaje' => $request->mensaje,
        ];

        Mail::to('jorge.rojas.j.for@gmail.com')->send(
            new ContactoMail($datos)
        );

        return back()->with(
            'success',
            'Mensaje enviado correctamente.'
        );
    }
}
