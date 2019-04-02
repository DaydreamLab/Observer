<?php

namespace DaydreamLab\Observer\Repositories\Unique\Admin;

use DaydreamLab\Observer\Repositories\Unique\UniqueVisitorRepository;
use DaydreamLab\Observer\Models\Unique\Admin\UniqueVisitorAdmin;

class UniqueVisitorAdminRepository extends UniqueVisitorRepository
{
    public function __construct(UniqueVisitorAdmin $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
    
}