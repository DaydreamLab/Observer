<?php

namespace DaydreamLab\Observer;


use DaydreamLab\JJAJ\Exceptions\BaseExceptionHandler;
use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\Media\Helpers\MediaHelper;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Debug\ExceptionHandler;

class ObserverServiceProvider extends ServiceProvider
{


    protected $commands = [
        'DaydreamLab\Media\Commands\InstallCommand',
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

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
