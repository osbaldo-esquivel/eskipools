<?php

namespace App\Domains\Scores;

use App\Domains\Scores\Services\ScoresService;
use Illuminate\Support\Facades\Facade;

class Scores extends Facade
{
    /**
     */
    public static function getFacadeAccessor()
    {
        return ScoresService::class;
    }
}