<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'country' => $this->faker->country(),
            'nick' => $this->faker->unique()->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'pic' => $this->faker->randomElement([
                'https://cdn.pixabay.com/photo/2022/12/10/01/50/woman-7646435_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/35/woman-7646415_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/43/woman-7646427_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/47/woman-7646432_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/16/03/crying-7647358_960_720.png',
                'https://cdn.pixabay.com/photo/2022/12/10/01/40/woman-7646421_960_720.png'
            ])
        ];
    }
}
