<?php

namespace App\Domains\Picks;

use App\Domains\Picks\Services\PicksService;
use Illuminate\Support\Facades\Facade;

class Picks extends Facade
{
    /**
     * @method static Pick create(array $attributes)
     */
    public static function getFacadeAccessor()
    {
        return PicksService::class;
    }
}