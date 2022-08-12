<?php

namespace App\Domains\Weeks\Services;

use App\Domains\Weeks\Models\Week;
use Illuminate\Database\Eloquent\Collection;

interface WeeksServiceInterface
{
    public function getOne(string $id): Week;

    public function getAll(): Collection;
}