<?php

namespace NormanHuth\LaravelAppConnector\Providers;

use Illuminate\Support\ServiceProvider;
use NormanHuth\LaravelAppConnector\Helpers;

class PackageProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->addAbout();
        }

        $this->publishes([
            __DIR__ . '/../../config/app-connector.php' => config_path('app-connector.php'),
        ], 'app-connector-config');

        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations')
        ], 'app-connector-migrations');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/app-connector.php',
            'app-connector'
        );
    }

    /**
     * Add additional data to the output of the "about" command.
     *
     * @param string $section
     *
     * @return void
     */
    protected function addAbout(string $section = 'Nova Packages'): void
    {
        if (!class_exists(\Illuminate\Foundation\Console\AboutCommand::class)) {
            return;
        }

        $reflection = new \ReflectionClass(__CLASS__);
        $composerJson = dirname($reflection->getFileName(), 2) . DIRECTORY_SEPARATOR . 'composer.json';

        var_dump($composerJson);

        if (!file_exists($composerJson)) {
            return;
        }

        $contents = json_decode(file_get_contents($composerJson), true);
        $name = data_get($contents, 'name');

        if (!$name) {
            return;
        }

        \Illuminate\Foundation\Console\AboutCommand::add(
            $section,
            fn() => [$name => Helpers\Composer::getLockedVersion($name)]
        );
    }
}
