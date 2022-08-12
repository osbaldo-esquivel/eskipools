<?php

namespace App\Domains\Weeks;

use App\Domains\Weeks\Services\WeeksService;
use App\Domains\Weeks\Services\WeeksServiceInterface;
use Illuminate\Support\ServiceProvider;

class WeeksServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(WeeksServiceInterface::class, WeeksService::class);
    }

    public function provides()
    {
        return [
            WeeksServiceInterface::class,
        ];
    }
}