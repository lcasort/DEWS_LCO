<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Usamos este método cuando queremos que el controlador administre una
    // única ruta.
    public function __invoke()
    {
        // return view('welcome');
        return "Bienvenido a la página principal.";
    }
}
