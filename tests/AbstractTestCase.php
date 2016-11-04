<?php

namespace BrianFaust\Tests\Watchable;

use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return \BrianFaust\Watchable\ServiceProvider::class;
    }
}
