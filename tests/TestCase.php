<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use PreemStudio\ArbitraryAttributes\ServiceProvider;
use Spatie\LaravelData\LaravelDataServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelDataServiceProvider::class,
            ServiceProvider::class,
        ];
    }
}
