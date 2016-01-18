<?php

namespace DraperStudio\Watchable;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'watchable';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();
    }
}
