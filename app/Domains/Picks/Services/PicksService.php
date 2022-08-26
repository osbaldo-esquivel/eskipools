<?php

namespace App\Domains\Picks\Services;

use App\Domains\Picks\Models\Pick;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PicksService implements PicksServiceInterface
{

    public function create(array $attributes): Pick
    {
        $attributes = array_merge($attributes, [
            'id' => Str::orderedUuid(),
        ]);

        return Pick::query()
            ->create($attributes);
    }

    public function update(string $id, array $attributes): Pick
    {dd($id);
        Pick::query()
            ->where('id', $id)
            ->update($attributes);

        return Pick::query()
            ->find($id);
    }

    public function getTeams(string $week_id, string $user_id): ?string
    {
        return Pick::query()
            ->where('user_id', $user_id)
            ->where('week_id', $week_id)
            ->first()
            ?->teams;
    }

    public function save(array $attributes, string $id = null): void
    {
        if ($id) {
            $this->update($id, $attributes);
        }

        $this->create($attributes);
    }

    public function getOne(string $id): ?Pick
    {
        return Pick::query()
            ->find($id);
    }

    public function submit(array $attributes): void
    {
        $this->save($attributes, Arr::get($attributes, 'id'));
    }
}