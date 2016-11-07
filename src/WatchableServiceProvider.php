<?php

namespace BrianFaust\Watchable;

use BrianFaust\ServiceProvider\ServiceProvider;

class WatchableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishMigrations();
    }

    public function getPackageName()
    {
        return 'watchable';
    }
}
