<?php

namespace DaydreamLab\Observer;


use Illuminate\Support\ServiceProvider;


class ObserverServiceProvider extends ServiceProvider
{


    protected $commands = [
        'DaydreamLab\Observer\Commands\InstallCommand',
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__. '/constants' => config_path('constants')], 'observer-configs');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        include __DIR__. '/routes/api.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
