<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Modulo;
use App\Models\ModuloAlumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }
    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:2|max:30',
            'apellidos' => 'required|min:2|max:100',
            'email' => 'required|unique:alumnos|regex:/^[a-z0-9+%ª\-\._]{3,}@([a-z0-9\.\-]{1,})\.*[a-z]{2,}$/',
        ]);

        $alumno = new Alumno;
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->email = $request->email;
        $alumno->save();

        return redirect()->route('alumnos');
    }

    public function store_modulo(Request $request, Modulo $modulo)
    {
        $request->validate([
            'nombre' => 'required|min:2|max:30',
            'apellidos' => 'required|min:2|max:100',
            'email' => 'required|regex:/^[a-z0-9+%ª\-\._]{3,}@([a-z0-9\.\-]{1,})\.*[a-z]{2,}$/',
        ]);

        $alumno = Alumno::where('email', $request->email)->first();
        if(!$alumno) {
            $alumno = new Alumno;
            $alumno->nombre = $request->nombre;
            $alumno->apellidos = $request->apellidos;
            $alumno->email = $request->email;
            $alumno->save();
        }

        $alumnoID = Alumno::where('email',$alumno->email)->first();
        $moduloAlumno = ModuloAlumno::where('modulo_id', $modulo->id)->where('alumno_id', $alumnoID->id)->first();
        if(!$moduloAlumno){
            $moduloAlumno = new ModuloAlumno;
            $moduloAlumno->alumno_id = $alumnoID->id;
            $moduloAlumno->modulo_id = $modulo->id;
            $moduloAlumno->save();
        }

        return redirect()->route('modulo.alumnos', $modulo->id);
    }
}
