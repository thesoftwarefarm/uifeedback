<?php

namespace TsfCorp\UiFeedback;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\ServiceProvider;

class UiFeedbackServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'uifeedback');

        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/uifeedback'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/config/uifeedback.php' => config_path('uifeedback.php')
        ], 'views');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('uifeedback', function ($app) {
            return new UiFeedback($app->make(Session::class));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'uifeedback',
        ];
    }
}