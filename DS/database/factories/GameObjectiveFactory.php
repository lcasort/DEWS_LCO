<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Objective;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameObjective>
 */
class GameObjectiveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $comp = [];
        
        $temp = [];
        do {
            $gameId = $this->faker->randomElement(Game::pluck('id')->toArray());
            $objectiveId = $this->faker->randomElement(Objective::pluck('id')->toArray());
            $temp = [$gameId, $objectiveId];
        } while(in_array($temp, $comp));

        $comp[] = [$gameId, $objectiveId];

        return [
            'game_id' => $temp[0],
            'objective_id' => $temp[1]
        ];
    }
}
