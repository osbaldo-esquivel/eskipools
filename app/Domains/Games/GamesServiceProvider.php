<?php

namespace App\Domains\Games;

use App\Domains\Games\Services\GamesService;
use App\Domains\Games\Services\GamesServiceInterface;
use Illuminate\Support\ServiceProvider;

class GamesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(GamesServiceInterface::class, GamesService::class);
    }

    public function provides()
    {
        return [
            GamesServiceInterface::class,
        ];
    }
}