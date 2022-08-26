<?php

namespace App\Domains\Picks\Services;

use App\Domains\Picks\Models\Pick;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PicksService implements PicksServiceInterface
{
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

    public function getCurrentPicks(string $week_id, int $user_id): Collection
    {
        return Pick::query()
            ->where('week_id', $week_id)
            ->where('user_id', $user_id)
            ->get();
    }

    public function delete(string $id): void
    {
        Pick::destroy($id);
    }

    private function create(array $attributes): Pick
    {
        $attributes = array_merge($attributes, [
            'id' => Str::orderedUuid(),
        ]);

        return Pick::query()
            ->create($attributes);
    }

    private function update(string $id, array $attributes): Pick
    {
        Pick::query()
            ->where('id', $id)
            ->update(Arr::only($attributes, 'team'));

        return $this->getOne($id);
    }
}