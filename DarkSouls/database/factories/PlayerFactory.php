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
                '../public/img/bosses/abyss-watcher.jpg',
                '../public/img/bosses/aldrich-devourer-of-gods.jpg',
                '../public/img/bosses/ancient-wyvern.jpg',
                '../public/img/bosses/champion-gundyr.jpg',
                '../public/img/bosses/crystal-sage.jpg',
                '../public/img/bosses/curse-rotted-greatwood.jpg',
                '../public/img/bosses/dancer-of-the-boreal-valley.jpg',
                '../public/img/bosses/deacon-of-the-deep.jpg',
                '../public/img/bosses/dragonslayer-armor.jpg',
                '../public/img/bosses/high-lord-wolnir.jpg',
                '../public/img/bosses/iudex-gundyr.jpg',
                '../public/img/bosses/lothric-younger-prince.jpg',
                '../public/img/bosses/ocelot.jpg',
                '../public/img/bosses/old_demon_king.jpg',
                '../public/img/bosses/pontiff_sulyvahn.jpg',
                '../public/img/bosses/soul-of-cinder.jpg',
                '../public/img/bosses/the-nameless-king.jpg',
                '../public/img/bosses/vordt.jpg',
                '../public/img/bosses/yhorm-the-giant.jpg'
            ])
        ];
    }
}
