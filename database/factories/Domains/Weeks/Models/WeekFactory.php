<?php

namespace Database\Factories\Domains\Weeks\Models;

use App\Domains\Weeks\Models\Week;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeekFactory extends Factory
{
    protected $model = Week::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'number' => $this->faker->unique()->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]),
            'is_active' => false,
        ];
    }
}