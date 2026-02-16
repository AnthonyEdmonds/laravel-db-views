<?php

namespace AnthonyEdmonds\LaravelDbViews\Tests;

use AnthonyEdmonds\LaravelDbViews\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class TestView extends View
{
    protected function name(): string
    {
        return 'my_view';
    }

    protected function definition(): Builder
    {
        return DB::query()
            ->select([
                'id',
            ])
            ->from('my_table');
    }
}
