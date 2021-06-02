<?php

namespace WebId\Cafe\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use WebId\Cafe\CafeServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'WebId\\Cafe\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );


    }

    protected function getPackageProviders($app)
    {
        return [
            CafeServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('cafe.repositories_folder_path', 'repositories');
    }
}
