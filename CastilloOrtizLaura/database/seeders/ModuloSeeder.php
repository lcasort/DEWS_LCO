<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulo1 = new Modulo;
        $modulo1->nombre = "DWES";
        $modulo1->save();

        $modulo2 = new Modulo;
        $modulo2->nombre = "DWEC";
        $modulo2->save();
    }
}
