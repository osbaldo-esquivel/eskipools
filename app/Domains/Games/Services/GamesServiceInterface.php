<?php

namespace App\Domains\Games\Services;

use App\Domains\Games\Models\Game;
use Illuminate\Database\Eloquent\Collection;

interface GamesServiceInterface
{
    public function getOne(string $id): ?Game;

    public function getAll(): Collection;
}