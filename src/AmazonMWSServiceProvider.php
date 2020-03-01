<?php


namespace Enbit\LaravelAmazonMWS;

use Illuminate\Support\ServiceProvider;

class AmazonMWSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/enbit-amazon-mws.php' => config_path('enbit-amazon-mws.php'),
        ], 'config');
    }

    public function register()
    {
        $this->app->bind('enbit-amazon-mws', function ($app, $parameters=[]) {
            return new MWSService($parameters);
        });

        $this->mergeConfigFrom(__DIR__.'/../config/enbit-amazon-mws.php', 'enbit-amazon-mws');
    }
}