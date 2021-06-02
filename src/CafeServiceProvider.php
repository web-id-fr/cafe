<?php

namespace WebId\Cafe;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use WebId\Cafe\Commands\RepositoryCommand;

class CafeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('cafe')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_cafe_table')
            ->hasCommand(RepositoryCommand::class);
    }
}
