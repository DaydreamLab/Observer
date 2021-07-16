<?php

namespace DaydreamLab\Observer\Repositories\RequestLog\Admin;

use DaydreamLab\Observer\Models\RequestLog\Admin\RequestLogAdmin;
use DaydreamLab\Observer\Repositories\RequestLog\RequestLogRepository;

class RequestLogAdminRepository extends RequestLogRepository
{
    public function __construct(RequestLogAdmin $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}
