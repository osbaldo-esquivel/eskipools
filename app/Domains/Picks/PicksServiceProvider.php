<?php

namespace App\Domains\Picks;

use App\Domains\Picks\Services\PicksService;
use App\Domains\Picks\Services\PicksServiceInterface;
use Illuminate\Support\ServiceProvider;

class PicksServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PicksServiceInterface::class, PicksService::class);
    }

    public function provides()
    {
        return [
            PicksServiceInterface::class,
        ];
    }
}