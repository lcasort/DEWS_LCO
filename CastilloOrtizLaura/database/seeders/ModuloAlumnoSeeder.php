<?php

namespace Database\Seeders;

use App\Models\ModuloAlumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuloAlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new ModuloAlumno;
        $a->alumno_id = 1;
        $a->modulo_id = 1;
        $a->save();
        $b = new ModuloAlumno;
        $b->alumno_id = 1;
        $b->modulo_id = 2;
        $b->save();

        $c = new ModuloAlumno;
        $c->alumno_id = 2;
        $c->modulo_id = 1;
        $c->save();
        $d = new ModuloAlumno;
        $d->alumno_id = 2;
        $d->modulo_id = 2;
        $d->save();

        $e = new ModuloAlumno;
        $e->alumno_id = 3;
        $e->modulo_id = 1;
        $e->save();
    }
}
