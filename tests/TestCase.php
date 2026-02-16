<?php

namespace AnthonyEdmonds\LaravelDbViews\Tests;

use AnthonyEdmonds\LaravelDbViews\DbViewsServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->useDatabasePath(__DIR__ . '/Database');
        $this->runLaravelMigrations();

        config()->set('db-views.views', [
            TestView::class,
        ]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            DbViewsServiceProvider::class,
        ];
    }
}
