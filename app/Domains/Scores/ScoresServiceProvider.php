<?php

namespace App\Domains\Scores;

use App\Domains\Scores\Services\ScoresService;
use App\Domains\Scores\Services\ScoresServiceInterface;
use Illuminate\Support\ServiceProvider;

class ScoresServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ScoresServiceInterface::class, ScoresService::class);
    }

    public function provides(): array
    {
        return [
            ScoresService::class,
        ];
    }
}