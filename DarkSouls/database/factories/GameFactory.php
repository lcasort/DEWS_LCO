<?php

namespace Database\Factories;

use App\Models\Classes;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'time' => $this->faker->time(),
            'total_hits' => $this->faker->randomNumber(),
            'enemy_hits' => $this->faker->randomNumber(),
            'scenary_hits' => $this->faker->randomNumber(),
            'finishing_level' => $this->faker->randomNumber(),
            'player_id' => $this->faker->randomElement(Player::pluck('id')->toArray()),
            'class_id' => $this->faker->randomElement(Classes::pluck('id')->toArray())
        ];
    }
}
