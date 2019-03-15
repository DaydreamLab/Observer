<?php

namespace DaydreamLab\Observer;

use App\Providers\EventServiceProvider;
use DaydreamLab\Observer\Listeners\ObserverEventSubscriber;

class ObserverEventServiceProvider extends EventServiceProvider
{
    protected $subscribe = [
        ObserverEventSubscriber::class
    ];


    public function boot()
    {
        parent::boot();
    }
}
