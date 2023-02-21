<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warrior = new Classes;
        $warrior->name = "Warrior";
        $warrior->save();

        $knight = new Classes;
        $knight->name = "Knight";
        $knight->save();

        $wanderer = new Classes;
        $wanderer->name = "Wanderer";
        $wanderer->save();

        $thief = new Classes;
        $thief->name = "Thief";
        $thief->save();

        $bandit = new Classes;
        $bandit->name = "Bandit";
        $bandit->save();

        $hunter = new Classes;
        $hunter->name = "Hunter";
        $hunter->save();

        $sorcerer = new Classes;
        $sorcerer->name = "Sorcerer";
        $sorcerer->save();

        $pyromancer = new Classes;
        $pyromancer->name = "Pyromancer";
        $pyromancer->save();

        $cleric = new Classes;
        $cleric->name = "Cleric";
        $cleric->save();

        $deprived = new Classes;
        $deprived->name = "Deprived";
        $deprived->save();
    }
}
