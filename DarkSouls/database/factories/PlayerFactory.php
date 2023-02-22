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
                '../resources/img/bosses/abyss-watcher.jpg',
                '../resources/img/bosses/aldrich-devourer-of-gods.jpg',
                '../resources/img/bosses/ancient-wyvern.jpg',
                '../resources/img/bosses/champion-gundyr.jpg',
                '../resources/img/bosses/crystal-sage.jpg',
                '../resources/img/bosses/curse-rotted-greatwood.jpg',
                '../resources/img/bosses/dancer-of-the-boreal-valley.jpg',
                '../resources/img/bosses/deacon-of-the-deep.jpg',
                '../resources/img/bosses/dragonslayer-armor.jpg',
                '../resources/img/bosses/high-lord-wolnir.jpg',
                '../resources/img/bosses/iudex-gundyr.jpg',
                '../resources/img/bosses/lothric-younger-prince.jpg',
                '../resources/img/bosses/ocelot.jpg',
                '../resources/img/bosses/old_demon_king.jpg',
                '../resources/img/bosses/pontiff_sulyvahn.jpg',
                '../resources/img/bosses/soul-of-cinder.jpg',
                '../resources/img/bosses/the-nameless-king.jpg',
                '../resources/img/bosses/vordt.jpg',
                '../resources/img/bosses/yhorm-the-giant.jpg'
            ])
        ];
    }
}
