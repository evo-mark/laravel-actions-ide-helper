<?php

namespace EvoMark\LaravelActionsIdeHelper\Tests;

use Lorisleiva\Lody\Lody;
use Orchestra\Testbench\TestCase as Orchestra;
use EvoMark\LaravelActionsIdeHelper\LaravelActionsIdeHelperServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Lody::setAutoloadPath(dirname(__DIR__) . '/vendor/composer/autoload_psr4.php');
    }

    protected function getPackageProviders($app)
    {
        return [
            \Lorisleiva\Lody\LodyServiceProvider::class,
            LaravelActionsIdeHelperServiceProvider::class,
        ];
    }
}
