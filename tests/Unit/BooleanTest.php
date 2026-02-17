<?php

namespace AnthonyEdmonds\LaravelDbViews\Tests\Unit;

use AnthonyEdmonds\LaravelDbViews\Tests\TestCase;
use AnthonyEdmonds\LaravelDbViews\View;
use Illuminate\Support\Facades\DB;

class BooleanTest extends TestCase
{
    public function test(): void
    {
        $this->assertEquals(
            'CASE WHEN `my_column` = 1 THEN "Yes" WHEN `my_column` = 0 THEN "No" ELSE "No" END AS "my_boolean"',
            View::boolean('my_column', 'my_boolean')->getValue(
                DB::getQueryGrammar(),
            ),
        );
    }
}
