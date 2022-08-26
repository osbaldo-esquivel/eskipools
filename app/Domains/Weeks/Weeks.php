<?php

namespace App\Domains\Weeks;

use App\Domains\Weeks\Models\Week;
use App\Domains\Weeks\Services\WeeksService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

class Weeks extends Facade
{
    /**
     * @method static ?Week      getActive()
     * @method static ?Week      getOne(string $id)
     * @method static Collection getAll()
     */
    public static function getFacadeAccessor()
    {
        return WeeksService::class;
    }
}