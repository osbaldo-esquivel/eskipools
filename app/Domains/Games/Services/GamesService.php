<?php

namespace App\Domains\Games\Services;

use App\Domains\Games\Models\Game;
use Illuminate\Database\Eloquent\Collection;

class GamesService implements GamesServiceInterface
{
    public function getOne(string $id): ?Game
    {
        return Game::query()
            ->find($id);
    }

    public function getAll(): Collection
    {
        return Game::query()
            ->get();
    }
}