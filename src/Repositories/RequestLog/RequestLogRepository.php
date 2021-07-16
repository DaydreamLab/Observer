<?php

namespace DaydreamLab\Observer\Repositories\RequestLog;

use DaydreamLab\Observer\Models\RequestLog\RequestLog;
use DaydreamLab\Observer\Repositories\ObserverRepository;

class RequestLogRepository extends ObserverRepository
{
    protected $modelName = 'RequestLog';

    public function __construct(RequestLog $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
