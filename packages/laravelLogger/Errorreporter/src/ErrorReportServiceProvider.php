<?php

namespace laravelLogger\Errorreporter;
use laravelLogger\Errorreporter\CustomeErrorReporter;
;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;

class ErrorReportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {

        app('router')->aliasMiddleware('Rlogger', \laravelLogger\Errorreporter\Middleware\Rlogger::class);

        $this->app->bind(
            ExceptionHandler::class,
            CustomeErrorReporter::class
        );

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'contactform');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');

    }
}
