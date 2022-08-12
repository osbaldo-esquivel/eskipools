<?php

namespace App\Domains\Games;

use App\Domains\Games\Services\GamesService;
use Illuminate\Support\Facades\Facade;

class Games extends Facade
{
    /**
     * @method static ?Game      getOne(string $id)
     * @method static Collection getAll()
     */
    public static function getFacadeAccessor()
    {
        return GamesService::class;
    }
}