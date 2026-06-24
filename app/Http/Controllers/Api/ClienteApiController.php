<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClienteApiController extends Controller
{
    public function index()
    {
        return response()->json(Cliente::all());
    }
}