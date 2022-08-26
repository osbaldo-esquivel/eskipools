<?php

namespace Database\Factories\Domains\Games\Models;

use App\Domains\Games\Models\Game;
use App\Domains\Weeks\Models\Week;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'home_team' => $this->faker->word(),
            'away_team' => $this->faker->word(),
            'city' => $this->faker->city(),
            'time' => Carbon::now()->format('Y-M-d'),
            'week_id' => Week::factory(),
        ];
    }
}