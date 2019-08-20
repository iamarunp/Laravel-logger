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
        $this->mergeConfigFrom(
            __DIR__ . '/config/laravel_log_config.php', 'laravel-log-config'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->publishes([
            __DIR__ . '/config' => config_path(),
        ]);


        app('router')->aliasMiddleware('Rlogger', \laravelLogger\Errorreporter\Middleware\Rlogger::class);

        // $this->app->bind(
        //     ExceptionHandler::class,
        //     CustomeErrorReporter::class
        // );
// dd("adsad");
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'contactform');

        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
    }
}
