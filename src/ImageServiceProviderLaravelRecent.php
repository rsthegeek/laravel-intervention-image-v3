<?php

namespace Rsthegeek\LaravelInterventionImageV3;

use Intervention\Image\ImageManager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class ImageServiceProviderLaravelRecent extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => $this->app->configPath('image.php')
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        // merge default config
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php',
            'image'
        );

        // create image
        $app->singleton('image', function ($app) {
            return new ImageManager($this->getImageDriver($app));
        });

        $app->alias('image', 'Intervention\Image\ImageManager');
    }

    /**
     * Return image configuration as array
     *
     * @param  Application $app
     * @param  string $default
     * @return string
     */
    private function getImageDriver($app, string $default = 'gd'): string
    {
        return $app['config']->get('image.driver', $default);
    }
}
