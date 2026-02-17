<?php

namespace AnthonyEdmonds\LaravelDbViews;

use Illuminate\Support\Facades\Artisan;

/** @codeCoverageIgnore */
trait AssertsDatabaseViews
{
    public function useDatabaseViews(): void
    {
        Artisan::call('update:db-views');
    }
}
