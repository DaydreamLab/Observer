<?php

namespace DaydreamLab\Observer\Repositories\Search;

use DaydreamLab\JJAJ\Repositories\BaseRepository;
use DaydreamLab\Observer\Models\Search\Search;

class SearchRepository extends BaseRepository
{
    public function __construct(Search $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
}