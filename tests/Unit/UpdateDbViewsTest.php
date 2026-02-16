<?php

namespace AnthonyEdmonds\LaravelDbViews\Tests\Unit;

use AnthonyEdmonds\LaravelDbViews\Tests\TestCase;
use AnthonyEdmonds\LaravelDbViews\Tests\TestView;
use AnthonyEdmonds\LaravelDbViews\UpdateDbViews;
use Illuminate\Support\Facades\Artisan;

class UpdateDbViewsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::registerCommand(new UpdateDbViews());
    }

    public function test(): void
    {
        $this->artisan('update:db-views')
            ->expectsConfirmation('This will destroy and create all database views. Continue?', 'yes')
            ->expectsOutput('Getting views...')
            ->expectsOutput('== Removing ' . TestView::class . '...')
            ->expectsOutput('== Creating ' . TestView::class . '...')
            ->expectsOutput('Done!');
    }
}
