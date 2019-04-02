<?php

namespace DaydreamLab\Observer\Repositories\Unique\Front;

use DaydreamLab\Observer\Repositories\Unique\UniqueVisitorCounterRepository;
use DaydreamLab\Observer\Models\Unique\Front\UniqueVisitorCounterFront;

class UniqueVisitorCounterFrontRepository extends UniqueVisitorCounterRepository
{
    public function __construct(UniqueVisitorCounterFront $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
    
}