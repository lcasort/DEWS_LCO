<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'name' => $this->faker->firstName(),
            'country' => $this->faker->country(),
            'nick' => $this->faker->unique()->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'pic' => $this->faker->randomElement([
                'img/bosses/abyss-watcher.jpg',
                'img/bosses/aldrich-devourer-of-gods.jpg',
                'img/bosses/ancient-wyvern.jpg',
                'img/bosses/champion-gundyr.jpg',
                'img/bosses/crystal-sage.jpg',
                'img/bosses/curse-rotted-greatwood.jpg',
                'img/bosses/dancer-of-the-boreal-valley.jpg',
                'img/bosses/deacon-of-the-deep.jpg',
                'img/bosses/dragonslayer-armor.jpg',
                'img/bosses/high-lord-wolnir.jpg',
                'img/bosses/iudex-gundyr.jpg',
                'img/bosses/lothric-younger-prince.jpg',
                'img/bosses/ocelot.jpg',
                'img/bosses/old_demon_king.jpg',
                'img/bosses/pontiff_sulyvahn.jpg',
                'img/bosses/soul-of-cinder.jpg',
                'img/bosses/the-nameless-king.jpg',
                'img/bosses/vordt.jpg',
                'img/bosses/yhorm-the-giant.jpg'
            ])
        ];
    }
}
