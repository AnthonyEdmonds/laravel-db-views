<?php

namespace AnthonyEdmonds\LaravelDbViews\Tests\Unit;

use AnthonyEdmonds\LaravelDbViews\Tests\TestCase;
use AnthonyEdmonds\LaravelDbViews\Tests\TestView;
use Illuminate\Support\Facades\DB;

class ViewTest extends TestCase
{
    public function test(): void
    {
        // Create
        $this->assertTrue(
            TestView::create()
        );

        $views = DB::select("SELECT name FROM sqlite_master WHERE type='view'");

        $this->assertContains(
            'my_view',
            array_column($views, 'name'),
        );

        // Destroy
        $this->assertTrue(
            TestView::destroy(),
        );

        $views = DB::select("SELECT name FROM sqlite_master WHERE type='view'");

        $this->assertNotContains(
            'my_view',
            array_column($views, 'name'),
        );
    }
}
