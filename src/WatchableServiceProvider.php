<?php



declare(strict_types=1);

namespace BrianFaust\Watchable;

use BrianFaust\ServiceProvider\ServiceProvider;

class WatchableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishMigrations();
    }

    public function getPackageName(): string
    {
        return 'watchable';
    }
}
