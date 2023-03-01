<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);

        \App\Models\Player::factory(25)->create();

        $this->call(ClassesSeeder::class);
        $this->call(ObjectiveSeeder::class);

        \App\Models\Game::factory(50)->create();
        \App\Models\GameObjective::factory(100)->create();
    }
}
