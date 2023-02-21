<?php

namespace Database\Seeders;

use App\Models\Objective;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boss1 = new Objective;
        $boss1->name = "Iudex Gundyr";
        $boss1->save();

        $boss2 = new Objective;
        $boss2->name = "Vordt of the Boreal Valley";
        $boss2->save();

        $boss3 = new Objective;
        $boss3->name = "Curse-Rotted Greatwood";
        $boss3->save();

        $boss4 = new Objective;
        $boss4->name = "Crystal Sage";
        $boss4->save();

        $boss5 = new Objective;
        $boss5->name = "Abyss Watchers";
        $boss5->save();

        $boss6 = new Objective;
        $boss6->name = "Deacons of the Deep";
        $boss6->save();

        $boss7 = new Objective;
        $boss7->name = "High Lord Wolnir";
        $boss7->save();

        $boss8 = new Objective;
        $boss8->name = "Old Demon King";
        $boss8->save();

        $boss9 = new Objective;
        $boss9->name = "Pontiff Sulyvahn";
        $boss9->save();

        $boss10 = new Objective;
        $boss10->name = "Yhorm the Giant";
        $boss10->save();

        $boss11 = new Objective;
        $boss11->name = "Aldrich, Devourer of Gods";
        $boss11->save();

        $boss12 = new Objective;
        $boss12->name = "Dancer of the Boreal Valley";
        $boss12->save();

        $boss13 = new Objective;
        $boss13->name = "Dragonslayer Armour";
        $boss13->save();

        $boss14 = new Objective;
        $boss14->name = "Oceiros, the Consumed King";
        $boss14->save();

        $boss15 = new Objective;
        $boss15->name = "Champion Gundyr";
        $boss15->save();

        $boss16 = new Objective;
        $boss16->name = "Lothric, Younger Prince";
        $boss16->save();

        $boss17 = new Objective;
        $boss17->name = "Ancient Wyvern";
        $boss17->save();

        $boss18 = new Objective;
        $boss18->name = "Nameless King";
        $boss18->save();

        $boss19 = new Objective;
        $boss19->name = "Soul of Cinder";
        $boss19->save();
    }
}
