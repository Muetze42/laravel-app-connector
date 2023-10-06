<?php

namespace NormanHuth\StreamGames42\Providers;

use Illuminate\Support\ServiceProvider;
use NormanHuth\StreamGames42\Helpers;

class PackageProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/stream-games-42.php' => config_path('stream-games-42.php'),
        ], 'stream-games-42-config');

        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('migrations')
        ], 'stream-games-42-migrations');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/stream-games-42.php',
            'stream-games-42'
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

        if (!$this->app->runningInConsole()) {
            return;
        }

        $reflection = new \ReflectionClass(__CLASS__);
        $composerJson = dirname($reflection->getFileName(), 2) . DIRECTORY_SEPARATOR . 'composer.json';

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
