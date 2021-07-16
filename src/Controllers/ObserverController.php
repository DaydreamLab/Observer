<?php

namespace DaydreamLab\Observer\Controllers;

use DaydreamLab\JJAJ\Controllers\BaseController;
use DaydreamLab\JJAJ\Services\BaseService;

abstract class ObserverController extends BaseController
{
    protected $package = 'Observer';

    public function __construct(BaseService $service)
    {
        parent::__construct($service);
        $this->service = $service;
    }
}
