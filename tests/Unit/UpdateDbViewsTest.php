<?php

namespace AnthonyEdmonds\LaravelDbViews\Tests\Unit;

use AnthonyEdmonds\LaravelDbViews\Tests\TestCase;
use AnthonyEdmonds\LaravelDbViews\Tests\TestView;

class UpdateDbViewsTest extends TestCase
{
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
