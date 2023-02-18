<?php

declare(strict_types=1);

namespace PreemStudio\ArbitraryAttributes;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-arbitrary-attributes')
            ->hasMigration('create_arbitrary_attributes_tables');
    }
}
