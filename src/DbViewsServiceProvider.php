<?php

namespace AnthonyEdmonds\LaravelDbViews;

use Illuminate\Support\ServiceProvider;

class DbViewsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config.php',
            'db-views',
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('db-views.php'),
        ], 'db-views');
    }
}
