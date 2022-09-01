<?php

namespace Database\Seeders;

use App\Domains\Weeks\Models\Week;
use Illuminate\Database\Seeder;

class WeekSeeder extends Seeder
{
    public function run(): void
    {
        $weeks = collect(range(1,17));

        $weeks->each(function ($week) {
            Week::factory()
                ->create([
                    'number' => $week,
                ]);
        });

        Week::query()
            ->where('number', 1)
            ->first()
            ->update([
                'is_active' => true,
            ]);
    }
}