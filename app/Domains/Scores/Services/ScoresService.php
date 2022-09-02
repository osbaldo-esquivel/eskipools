<?php

namespace App\Domains\Scores\Services;

use App\Domains\Scores\Models\Score;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ScoresService implements ScoresServiceInterface
{
    public function save(array $attributes): Score
    {
        if ($id = Arr::get($attributes, 'id')) {
            return $this->update($id, $attributes);
        }

        return $this->create($attributes);
    }

    private function create(array $attributes): Score
    {
        $id = Str::orderedUuid();

        $attributes = Arr::add($attributes, 'id', $id);

        return Score::query()
            ->create($attributes);
    }

    private function update(string $id, array $attributes): Score
    {
        $score = Score::query()
            ->where('id', $id)
            ->first();

        if (! $score) {
            throw new Exception('Model does not exist');
        }

        $score->update($attributes);

        return $score->fresh();
    }
}