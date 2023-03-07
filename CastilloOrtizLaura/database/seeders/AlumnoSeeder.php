<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumno1 = new Alumno;
        $alumno1->nombre = "Cristina";
        $alumno1->apellidos = "Rodriguez Moreno";
        $alumno1->email = "cristinarm@gmail.com";
        $alumno1->save();

        $alumno2 = new Alumno;
        $alumno2->nombre = "Marina";
        $alumno2->apellidos = "Gonzalez Borrego";
        $alumno2->email = "marinagb@gmail.com";
        $alumno2->save();

        $alumno3 = new Alumno;
        $alumno3->nombre = "Alex";
        $alumno3->apellidos = "Caballero García";
        $alumno3->email = "alexcg@gmail.com";
        $alumno3->save();
    }
}
