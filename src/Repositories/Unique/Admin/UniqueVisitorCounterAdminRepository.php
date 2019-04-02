<?php

namespace DaydreamLab\Observer\Repositories\Unique\Admin;

use DaydreamLab\Observer\Repositories\Unique\UniqueVisitorCounterRepository;
use DaydreamLab\Observer\Models\Unique\Admin\UniqueVisitorCounterAdmin;

class UniqueVisitorCounterAdminRepository extends UniqueVisitorCounterRepository
{
    public function __construct(UniqueVisitorCounterAdmin $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    
}