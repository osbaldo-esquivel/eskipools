<?php

namespace App\Domains\Weeks\Services;

use App\Domains\Weeks\Models\Week;
use Illuminate\Database\Eloquent\Collection;

class WeeksService implements WeeksServiceInterface
{
    public function getOne(string $id): Week
    {
        return Week::query()->find($id);
    }

    public function getAll(): Collection
    {
        return Week::query()
            ->get();
    }
}