<?php

namespace Database\Seeders;

use App\Domains\Games\Models\Game;
use App\Domains\Weeks\Models\Week;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $this->getGames()->each(function (array $attributes) {
            Game::factory()
                ->create($attributes);
        });
    }

    private function getGames(): Collection
    {
        return collect([
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'rams',
                'away_team' => 'bills',
                'city' => 'los angeles',
                'date' => '2022-09-08 17:20',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'lions',
                'away_team' => 'eagles',
                'city' => 'detroit',
                'date' => '2022-09-11 10:00',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'bears',
                'away_team' => '49ers',
                'city' => 'chicago',
                'date' => '2022-09-11 10:00',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'bengals',
                'away_team' => 'steelers',
                'city' => 'cincinnati',
                'date' => '2022-09-11 10:00',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'dolphins',
                'away_team' => 'patriots',
                'city' => 'miami',
                'date' => '2022-09-11 10:00',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'panthers',
                'away_team' => 'browns',
                'city' => 'charlotte',
                'date' => '2022-09-11 10:00',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'texans',
                'away_team' => 'colts',
                'city' => 'houston',
                'date' => '2022-09-11 10:00',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'falcons',
                'away_team' => 'saints',
                'city' => 'atlanta',
                'date' => '2022-09-11 10:00',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'jets',
                'away_team' => 'ravens',
                'city' => 'north rutherford',
                'date' => '2022-09-08 17:20',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'commanders',
                'away_team' => 'jaguars',
                'city' => 'washington, d.c.',
                'date' => '2022-09-11 10:00',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'vikings',
                'away_team' => 'packers',
                'city' => 'minnesota',
                'date' => '2022-09-11 13:25',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'titans',
                'away_team' => 'giants',
                'city' => 'tennesse',
                'date' => '2022-09-11 13:25',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'chargers',
                'away_team' => 'raiders',
                'city' => 'los angeles',
                'date' => '2022-09-11 13:25',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'cardinals',
                'away_team' => 'chiefs',
                'city' => 'phoenix',
                'date' => '2022-09-11 13:25',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'cowboys',
                'away_team' => 'buccaneers',
                'city' => 'arlington',
                'date' => '2022-09-11 17:20',
            ],
            [
                'week_id' => Week::query()->where('number', 1)->first()->id,
                'home_team' => 'seahawks',
                'away_team' => 'broncos',
                'city' => 'seattle',
                'date' => '2022-09-12 17:15',
            ],
        ]);
    }
}