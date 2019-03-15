<?php

namespace DaydreamLab\Observer\Repositories\Search\Admin;

use DaydreamLab\Observer\Repositories\Search\SearchRepository;
use DaydreamLab\Observer\Models\Search\Admin\SearchAdmin;

class SearchAdminRepository extends SearchRepository
{
    public function __construct(SearchAdmin $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}