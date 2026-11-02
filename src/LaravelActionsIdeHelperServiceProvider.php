<?php

namespace EvoMark\LaravelActionsIdeHelper;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use EvoMark\LaravelActionsIdeHelper\Commands\LaravelActionsIdeHelperCommand;

class LaravelActionsIdeHelperServiceProvider extends PackageServiceProvider
{
    #[\Override]
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-actions-ide-helper')
            ->hasConfigFile('actions-ide-helper')
            // ->hasViews()
            // ->hasMigration('create_laravel-actions-ide-helper_table')
            ->hasCommand(LaravelActionsIdeHelperCommand::class);
    }
}
