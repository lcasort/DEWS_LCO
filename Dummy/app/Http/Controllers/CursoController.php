<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Método encargado de gestionar la página principal.
    public function index()
    {
        return "Bienvenido a la página de cursos.";
    }

    // Método encargado de mostrar el formulario de creación.
    public function create()
    {
        return "En esta página podrás crear un curso.";
    }

    // Método encargado de mostrar un elemento en particular.
    public function show($curso)
    {
        return "Bienvenido a la página del curso $curso.";
    }
}
