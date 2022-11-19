<?php

namespace Mawuva\UserFeatureSet;

use Illuminate\Support\ServiceProvider;
use Mawuva\UserFeatureSet\Console\InstallCommand;
use Mawuva\UserFeatureSet\UserFeatureSetFactory;

class UserFeatureSetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'user-feature-set');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'user-feature-set');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/user-feature-set.php' => config_path('user-feature-set.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/seeders/publish' => database_path('seeders'),
            ], 'seeders');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/user-feature-set'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/user-feature-set'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/user-feature-set'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                InstallCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/user-feature-set.php', 'user-feature-set');

        // Register the main class to use with the facade
        $this->app->singleton('user-feature-set', function () {
            return new UserFeatureSetFactory;
        });
    }
}
