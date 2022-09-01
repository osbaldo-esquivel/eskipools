<?php

namespace App\Domains\Scores\Services;

use App\Domains\Scores\Models\Score;

interface ScoresServiceInterface
{
    public function save(array $attributes): Score;
}