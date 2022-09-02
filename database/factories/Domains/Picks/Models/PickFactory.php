<?php

namespace Database\Factories\Domains\Picks\Models;

use App\Domains\Games\Models\Game;
use App\Domains\Picks\Models\Pick;
use App\Domains\Weeks\Models\Week;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PickFactory extends Factory
{
    protected $model = Pick::class;

    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'user_id' => User::factory(),
            'week_id' => Week::factory(),
            'team' => 'chargers',
            'game_id' => Game::factory(),
        ];
    }
}