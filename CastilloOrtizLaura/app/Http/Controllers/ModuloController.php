<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Modulo;
use App\Models\ModuloAlumno;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function list($id)
    {
        $alumnos = ModuloAlumno::where('modulo_id', $id)->addSelect([
            'nombre_alumno' => Alumno::select('nombre')
            ->whereColumn('id', 'modulo_alumno.alumno_id')
        ])->addSelect([
            'apellidos_alumno' => Alumno::select('apellidos')
            ->whereColumn('id', 'modulo_alumno.alumno_id')
        ])->addSelect([
            'email_alumno' => Alumno::select('email')
            ->whereColumn('id', 'modulo_alumno.alumno_id')
        ])->get();
        $modulo = Modulo::where('id',$id)->first();
        return view('alumnos.list', compact('alumnos','modulo'));
    }
}
