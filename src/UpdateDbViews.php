<?php

namespace AnthonyEdmonds\LaravelDbViews;

use Illuminate\Console\Command;

class UpdateDbViews extends Command
{
    protected $signature = 'update:db-views';

    protected $description = 'Recreates all database views';

    public function handle(): void
    {
        if ($this->option('no-interaction') !== true) {
            $this->confirm('This will destroy and create all database views. Continue?');
        }

        $this->info('Getting views...');

        /** @var class-string<View>[] $views */
        $views = config('db-views.views');

        foreach ($views as $view) {
            $this->info("== Removing $view...");
            $view::destroy();

            $this->info("== Creating $view...");
            $view::create();
        }

        $this->info('Done!');
    }
}
