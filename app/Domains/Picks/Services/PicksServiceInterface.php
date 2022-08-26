<?php

namespace App\Domains\Picks\Services;

use App\Domains\Picks\Models\Pick;

interface PicksServiceInterface
{
    public function create(array $attributes): Pick;

    public function getTeams(string $week_id, string $user_id): ?string;

    public function save(array $attributes): void;

    public function update(string $id, array $attributes): Pick;

    public function getOne(string $id): ?Pick;

    public function submit(array $attributes): void;
}