<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        return "Vista principal del listado de jugadores.";
    }

    public function create()
    {
        return "Vista del formulario de registro de un jugador.";
    }

    public function show($id)
    {
        return "Vista del perfil del jugador: $id.";
    }
}
