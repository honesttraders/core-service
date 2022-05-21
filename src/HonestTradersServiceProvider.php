<?php

namespace HonestTraders\CoreService;

use Illuminate\Support\ServiceProvider;
use HonestTraders\CoreService\Console\Commands\MigrateStatusCommand;
use HonestTraders\CoreService\Middleware\ServiceMiddleware;

class HonestTradersServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', ServiceMiddleware::class);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'service');
        $this->loadViewsFrom(resource_path('/views/vendors/service'), 'service');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/honesttraders'),
             __DIR__.'/../resources/views' => resource_path('views/vendors/service'),
        ], 'honesttraders');

        $this->commands([
            MigrateStatusCommand::class,
        ]);
    }
}

