<?php

/*
 * This file is part of Laravel Watchable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
