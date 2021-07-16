<?php

namespace DaydreamLab\Observer;

use App\Providers\EventServiceProvider;
use DaydreamLab\JJAJ\Requests\BaseRequestHandled;
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
