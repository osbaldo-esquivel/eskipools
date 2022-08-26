<?php

namespace App\Domains\Picks\Services;

use App\Domains\Picks\Models\Pick;
use Illuminate\Database\Eloquent\Collection;

interface PicksServiceInterface
{
    public function save(array $attributes): void;

    public function getOne(string $id): ?Pick;

    public function submit(array $attributes): void;

    public function getCurrentPicks(string $week_id, int $user_id): Collection;

    public function delete(string $id): void;
}