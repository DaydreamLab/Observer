<?php

namespace DaydreamLab\Observer\Repositories\Unique\Front;

use DaydreamLab\Observer\Repositories\Unique\UniqueVisitorRepository;
use DaydreamLab\Observer\Models\Unique\Front\UniqueVisitorFront;

class UniqueVisitorFrontRepository extends UniqueVisitorRepository
{
    public function __construct(UniqueVisitorFront $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}