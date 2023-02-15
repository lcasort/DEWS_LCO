<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return "Vista principal del listado de partidas.";
    }

    public function create()
    {
        return "Vista del formulario de registro de una partida.";
    }

    public function show($id)
    {
        return "Vista de la partida: $id.";
    }

    public function list($id)
    {
        return "Vista de las partidas del juegador: $id.";
    }
}
